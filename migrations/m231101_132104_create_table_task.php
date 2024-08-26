<?php

use yii\db\Migration;

/**
 * Создается таблица "Задачи".
 */
class m231101_132104_create_table_task extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB COMMENT "Задачи"';
        };

        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(100)->notNull()->comment('Название'),
            'description' => $this->string()->notNull()->comment('Описание'),
            'due_date' => $this->integer()->comment('Дата'),
            'status' => $this->integer(2)->comment('Статус'),
            'priority' => $this->integer(2)->comment('Приоритет'),
        ], $tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%task}}');
    }

}
