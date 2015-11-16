
<?php include $this->_include('_admin.header.tpl.php', __FILE__) ?>

<?php if ($type == 'system') { ?>
    <?php include $this->_include('_admin.system.tpl.php', __FILE__) ?>
<?php } ?>

<?php if ($type == 'common') { ?>
    <?php include $this->_include('_admin.common.tpl.php', __FILE__) ?>
<?php } ?>

<?php if ($type == 'user') { ?>
    <?php include $this->_include('_admin.user.tpl.php', __FILE__) ?>
<?php } ?>

<?php if ($type == 'topic') { ?>
    <?php include $this->_include('_admin.topic.tpl.php', __FILE__) ?>
<?php } ?>

<?php if ($type == 'reply') { ?>
    <?php include $this->_include('_admin.reply.tpl.php', __FILE__) ?>
<?php } ?>

<?php if ($type == 'tag') { ?>
    <?php include $this->_include('_admin.tag.tpl.php', __FILE__) ?>
<?php } ?>

<?php if ($type == 'link' || $type == 'edit_link' || $type == 'add_link') { ?>
    <?php include $this->_include('_admin.link.tpl.php', __FILE__) ?>
<?php } ?>

<footer>&copy; ROCBOSS v2.1.0 后台管理中心</footer>
