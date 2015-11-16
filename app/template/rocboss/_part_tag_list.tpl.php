<?php die('Access Denied');?>
<ul>
    {loop $list $t}
    <li class="topic-item">
        <div class="posts-group cf">

            <div class="topic-url">
                <a class="post-url" href="{$root}tag/{$t.tagname}" title="{$t.tagname}">
                    {$t.tagname}
                </a>
            </div>
        </div>
        <a class="topic-link" href="{$root}read/{$t.tid}" target="_blank"></a>
    </li>
    {/loop}
</ul>
<div id="pager">
    {if $list == array() }
        暂无数据
    {else}
        {$page}
    {/if}
</div>
