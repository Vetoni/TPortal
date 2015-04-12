<?php

namespace common\models\query;

use common\models\Node;
use yii\db\ActiveQuery;

class NodeQuery extends ActiveQuery
{
    public function published()
    {
        $this->addWhere((['status' => Node::STATUS_PUBLISHED]));
    }
}