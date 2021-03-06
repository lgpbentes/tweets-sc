<?php


namespace frontend\controllers;

require_once ("TwitterAPIExchange.php");

use common\models\Tweet;
use common\models\UserEvAccount;
use Yii;
use common\models\Account;
use common\models\AccountSearch;
use yii\base\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AccountController implements the CRUD actions for Account model.
 */
class AccountController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Account models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AccountSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Account model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $idUser = Yii::$app->user->identity->getId();
        $consulta = UserEvAccount::find()->where(['user_id'=>$idUser, 'account_id'=>$id])->one();

        if($consulta){
            $avaliacao = $consulta->bot;
        } else{
            $avaliacao = 0;
        }

        return $this->render('view', ['avaliacao'=>$avaliacao,
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Account();
        if ($model->load(Yii::$app->request->post())) {
            $settings = array(
                'oauth_access_token' => "801954703278010368-PhU1HwLkLKnUbcdVcaq34C94kU6Z0mF",
                'oauth_access_token_secret' => "xV3JypJzPJdERpDqd7USSqY0RrXVmTLx7eoHBBJ6UfemY",
                'consumer_key' => "jorvwR9VNPHLsyRoDsV3nYIVb",
                'consumer_secret' => "a8S4is8RWI0RY8DZBZ4Y3vVmhGWcgwglL1NmljE79InhMCZZy2"
            );
            $url = "https://api.twitter.com/1.1/users/show.json";
            $requestMethod = "GET";
            $twitter = new TwitterAPIExchange($settings);

            $contas = (explode(',',trim($model->username)));

            foreach ($contas as $conta){
                $model = new Account();
                $model->username = $conta;
                $getfield = "?screen_name=$conta";

                $user = $twitter->setGetfield($getfield)
                    ->buildOauth($url, $requestMethod)
                    ->performRequest();
                $model->user_json = $user;

                if (strpos($model->user_json, 'User not found') === false) {
                    $model->save();
                }
            }


            return $this->redirect(['index']);

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionRetrieveall(){
        $allAccounts = Account::find()->all();
        foreach ($allAccounts as $account){
            $this->actionRetrieve($account->username, 30, $account->id);
        }
    }

    public function actionRetrieve($screen_name, $count, $account_id)
    {
        $sql = "DELETE FROM tweet where account_id1 = $account_id";
        $connection = Yii::$app->getDb();
        $connection->createCommand($sql)->execute();

        $settings = array(
            'oauth_access_token' => "801954703278010368-PhU1HwLkLKnUbcdVcaq34C94kU6Z0mF",
            'oauth_access_token_secret' => "xV3JypJzPJdERpDqd7USSqY0RrXVmTLx7eoHBBJ6UfemY",
            'consumer_key' => "jorvwR9VNPHLsyRoDsV3nYIVb",
            'consumer_secret' => "a8S4is8RWI0RY8DZBZ4Y3vVmhGWcgwglL1NmljE79InhMCZZy2"
        );

        $url = "https://api.twitter.com/1.1/statuses/user_timeline.json";

        $requestMethod = "GET";

        $getfield = "?screen_name=".$screen_name."&count=".$count;

        $twitter = new TwitterAPIExchange($settings);
        $tweets = json_decode($twitter->setGetfield($getfield)
            ->buildOauth($url, $requestMethod)
            ->performRequest());

        //print_r($tweets);
        foreach ($tweets as $tw){
            $content = json_encode($tw);
            //print_r($tw);

            $novo = new Tweet();
            $novo->id = $tw->id;
            $novo->account_id1 = $account_id;
            $novo->content=$content;
            $novo->datatt = date_format(date_create($tw->created_at), 'Y-m-d H:i:s');
            //echo $novo->id;
            //echo " ". $novo->account_id1;
            //echo "</br>";

            try{
                $novo->save();
            } catch (Exception $e) {
                echo $novo->id;
            }
        }
        return $this->redirect(['view', 'id' => $account_id]);
    }

    public function actionVerdadeiro($id){
        $pontuacao = Yii::$app->user->identity->pontuacao + 10;

        $idUser = Yii::$app->user->identity->getId();

        $sqlGetId = "SELECT user_id FROM user_ev_account WHERE bot= '2' AND account_id=".$id;


        $sql = "INSERT INTO user_ev_account (user_id, account_id, bot) VALUES ($idUser, $id, '2')";
        $connection = Yii::$app->getDb();

        $resultsGetId =$connection ->createCommand($sqlGetId)->queryAll();

        print_r(count($resultsGetId));
        //$results = $results->queryAll();
        foreach ($resultsGetId as $resultGetId) {
            print_r($resultGetId['user_id']);
            $sqlGetPont = "SELECT pontuacao FROM user WHERE id=".$resultGetId['user_id'];
            $resultsGetPont =$connection ->createCommand($sqlGetPont)->queryAll();
            print_r($resultsGetPont);

            foreach ($resultsGetPont as $resultsGetPont) {
                $pontuacaoGet = $resultsGetPont['pontuacao'] + 3;
                print_r($pontuacaoGet);
                try{

                    $sqlUpdatePont = "UPDATE  user SET  pontuacao = $pontuacaoGet WHERE  id=".$resultGetId['user_id'];
                    $connection->createCommand($sqlUpdatePont)->execute();

                }catch (Exception $e){
                    return "Algo deu errado Dentro for";
                }



            }



            //print_r(1);
            echo '<br>';


        }
        if(count($resultsGetId)<=0){

            try{
                // insere na tabela user_ev_tweet


                $connection->createCommand($sql)->execute();

                $sql = "UPDATE  user SET  pontuacao = $pontuacao WHERE  id=$idUser";

                $connection->createCommand($sql)->execute();

            }catch (Exception $e){
                return "Algo deu errado";
            }
        } else{
            $pontuacao = Yii::$app->user->identity->pontuacao + (count($resultsGetId)*3) +10 ;
            try{
                // insere na tabela user_ev_tweet


                $connection->createCommand($sql)->execute();

                $sql = "UPDATE  user SET  pontuacao = $pontuacao WHERE  id=$idUser";

                $connection->createCommand($sql)->execute();

            }catch (Exception $e){
                return "Algo deu errado";
            }
        }



    }

    public function actionHistory()
    {
        return $this->render('history');
    }

    public function actionFalso($id){
        $pontuacao = Yii::$app->user->identity->pontuacao +10;

        $idUser = Yii::$app->user->identity->getId();
        $sqlGetId = "SELECT user_id FROM user_ev_account WHERE bot= '1' AND account_id=".$id;


        $sql = "INSERT INTO user_ev_account (user_id, account_id, bot) VALUES ($idUser, $id, '1')";
        $connection = Yii::$app->getDb();
        $resultsGetId =$connection ->createCommand($sqlGetId)->queryAll();
        print_r($resultsGetId);
        echo "<br>";
        print_r(count($resultsGetId));
        //$results = $results->queryAll();
        foreach ($resultsGetId as $resultGetId) {
            print_r($resultGetId['user_id']);
            $sqlGetPont = "SELECT pontuacao FROM user WHERE id=".$resultGetId['user_id'];
            $resultsGetPont =$connection ->createCommand($sqlGetPont)->queryAll();
            print_r($resultsGetPont);

            foreach ($resultsGetPont as $resultsGetPont) {
                $pontuacaoGet = $resultsGetPont['pontuacao'] + 3;
                print_r($pontuacaoGet);
                try{

                    $sqlUpdatePont = "UPDATE  user SET  pontuacao = $pontuacaoGet WHERE  id=".$resultGetId['user_id'];
                    $connection->createCommand($sqlUpdatePont)->execute();

                }catch (Exception $e){
                    return "Algo deu errado Dentro for";
                }



            }

            //print_r(1);
            echo '<br>';


        }
        if(count($resultsGetId)<=0){

            try{
                // insere na tabela user_ev_tweet


                $connection->createCommand($sql)->execute();

                $sql = "UPDATE  user SET  pontuacao = $pontuacao WHERE  id=$idUser";

                $connection->createCommand($sql)->execute();

            }catch (Exception $e){
                return "Algo deu errado";
            }
        } else{
            $pontuacao = Yii::$app->user->identity->pontuacao + (count($resultsGetId)*3)+10;
            try{
                // insere na tabela user_ev_tweet


                $connection->createCommand($sql)->execute();

                $sql = "UPDATE  user SET  pontuacao = $pontuacao WHERE  id=$idUser";

                $connection->createCommand($sql)->execute();

            }catch (Exception $e){
                return "Algo deu errado";
            }
        }

    }

    public function actionRanking()
    {
        return $this->render('ranking');
    }

    /**
     * Updates an existing Account model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Account model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Account model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Account the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Account::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
