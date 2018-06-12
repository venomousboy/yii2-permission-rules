<?php

namespace venomousboy/yii2-permission-rules;

use Yii;

class PermissionRules
{
    /**
     * @param string $role
     * @return bool
     */
    public static function requireRole(string $role): bool
    {
        if (!Yii::$app->user->isGuest) {
            return Yii::$app->user->identity->role === $role;
        }

        return false;
    }

    /**
     * @param string $status
     * @return bool
     */
    public static function requireStatus(string $status): bool
    {
        if (!Yii::$app->user->isGuest) {
            return Yii::$app->user->identity->status === $status;
        }

        return false;
    }
}
