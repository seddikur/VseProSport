<?php

use yii\db\Migration;

/**
 * Class m231102_073936_seed_task_table
 */
class m231102_073936_seed_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        {
            $faker = \Faker\Factory::create();
            for ($i = 0; $i < 20500; $i++) {
                $this->insert(
                    'task',
                    [
                        'title'         => $faker->catchPhrase,
//                        'title'         => $faker->text(30),
                        'description'         => $faker->text(rand(100, 200)),
                        'due_date' => $faker->unixTime(),
                        'status' =>  rand(0, 1),
                        'priority' =>  rand(0, 4),
                    ]
                );
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }

}
