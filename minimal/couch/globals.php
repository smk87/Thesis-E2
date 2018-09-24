<?php require_once('../couch/cms.php'); ?>

<cms:template title='Global Settings' excutable='0'>
    <cms:editable name='sitename' label="Site Name" type='text'></cms:editable>
    <cms:editable name='aboutinfo' label="Footer" type='text'></cms:editable>
    <cms:editable name='sitelogo' label='Site Logo' desc='Upload Site Logo' width='100' height='52' show_preview='1'
        type='image' />
</cms:template>

<?php COUCH::invoke(); ?>