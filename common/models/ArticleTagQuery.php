<?php
/**
 * Team:布里啾啾迪布利多,NKU
 * coding by huangjingzhi 1810729,20200509
 */

namespace common\models;

/**
 * This is the ActiveQuery class for [[ArticleTag]].
 *
 * @see ArticleTag
 */
class ArticleTagQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ArticleTag[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ArticleTag|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
