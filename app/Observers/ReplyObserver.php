<?php

namespace App\Observers;

use App\Models\Reply;
use App\Notifications\TopicReplied;


class ReplyObserver
{
    //统计回复数
    public function created(Reply $reply)
    {
        // 命令行运行迁移时不做这些操作！
        if ( ! app()->runningInConsole()) {
            $reply->topic->updateReplyCount();
            // 通知话题作者有新的评论
            $reply->topic->user->notify(new TopicReplied($reply));
        }
    }

    //过滤xss回复
    public function creating(Reply $reply)
    {
        $reply->content = clean($reply->content, 'user_topic_body');
    }

    //删除回复时回复数减一
    public function deleted(Reply $reply)
    {
        $reply->topic->updateReplyCount();
    }
}