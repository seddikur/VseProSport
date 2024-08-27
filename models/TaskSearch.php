<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Task;

/**
 * TaskSearch represents the model behind the search form of `app\models\Task`.
 */
class TaskSearch extends Task
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'due_date', 'status', 'priority'], 'integer'],
            [['title', 'description'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
//        $query = Task::find();

        // Обращаемся к кэшу приложения
        $cache = \Yii::$app->cache;
        // Формируем ключ
        $key = 'task_key_cache';



        // Вариант 1
//        $query = $cache->getOrSet($key, function () {
//            return Task::find();
//        });

        //Вариант2
        // Кэширование запросов для ActiveRecord (на 1 час)
        // Возвращает объект
        $query = Task::getDb()->cache(function (){
            return Task::find();
        }, 3600);

        // Очитит кэш всего приложения
//        \Yii::$app->cache->flush();


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);



        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'due_date' => $this->due_date,
            'status' => $this->status,
            'priority' => $this->priority,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
