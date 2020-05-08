<?php

namespace common\models;


/**
 * This is the ActiveQuery class for [[Article]].
 *
 * @see Article
 */
class ArticleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Article[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Article|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function latest(){
        return $this->orderBy(['date'=>SORT_DESC]);
    }

    public function published(){
        return $this->andWhere(['status'=>Article::STATUS_PUBLISHED]);
    }

}
