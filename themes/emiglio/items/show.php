<?php echo head(array('title' => metadata($item, array('Dublin Core', 'Title')), 'bodyclass' => 'items show')); ?>

<h1><?php echo metadata($item, array('Dublin Core', 'Title')); ?></h1>

<div id="primary">
    <?php if ((get_theme_option('Item FileGallery') == 0) && metadata('item', 'has files')): ?>
    <div id="itemfiles" class="element">
        <?php echo files_for_item(array('imageSize' => 'fullsize')); ?>
    </div>
    <?php endif; ?>
<h2>Title</h2>
<?php echo metadata('item', array('Dublin Core', 'Title')); ?>

<?php if (metadata('item', array('Dublin Core', 'Spatial Coverage'))): ?>
<h2>Locations</h2>
<?php endif; ?>
<?php echo metadata('item', array('Dublin Core', 'Coverage')); ?>
<?php echo metadata('item', array('Dublin Core', 'Spatial Coverage'), array('delimiter' => '<br>')); ?>
<br><br>
<?php if (metadata('item', array('Dublin Core', 'Temporal Coverage'))): ?>
<h2>Time Period</h2>
<?php endif; ?>
<?php echo metadata('item', array('Dublin Core', 'Temporal Coverage')); ?>

<?php if (metadata('item', array('Dublin Core', 'Subject'))): ?>
<h2>Individuals</h2>
<?php endif; ?>
<?php echo metadata('item', array('Dublin Core', 'Subject'), array('delimiter' => '; ')); ?>

<?php if (metadata('item', array('Zotero', 'Author'))): ?>
<h2>Author</h2>
<?php endif; ?>
<?php echo metadata('item', array('Zotero', 'Author'), array('delimiter' => '; ')); ?>

<?php if (metadata('item', array('Zotero', 'Item Type'))): ?>
<h2>Type of Resource</h2>
<?php endif; ?>
<?php echo metadata('item', array('Zotero', 'Item Type'), array('delimiter' => '; ')); ?>

<?php if (metadata('item', array('Zotero', 'Date'))): ?>
<h2>Date of Resource Creation</h2>
<?php endif; ?>
<?php echo metadata('item', array('Zotero', 'Date'), array('delimiter' => '; ')); ?>

<?php if (metadata('item', array('Zotero', 'Language'))): ?>
<h2>Language of Resource</h2>
<?php endif; ?>
<?php echo metadata('item', array('Zotero', 'Language'), array('delimiter' => '; ')); ?>

<?php if (metadata('item', array('Zotero', 'Publisher'))): ?>
<h2>Publisher</h2>
<?php endif; ?>
<?php echo metadata('item', array('Zotero', 'Publisher'), array('delimiter' => '; ')); ?>

<?php if (metadata('item', array('Zotero', 'Place'))): ?>
<h2>Place of Publication</h2>
<?php endif; ?>
<?php echo metadata('item', array('Zotero', 'Place'), array('delimiter' => '; ')); ?>

<br>

    <?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>

</div><!-- end primary -->

<div id="secondary">

    <!-- The following returns all of the files associated with an item. -->
    <?php if ((get_theme_option('Item FileGallery') == 1) && metadata($item, 'has files')): ?>
    <div id="itemfiles" class="element">
        <h2>Files</h2>
        <div class="element-text"><?php echo item_image_gallery(); ?></div>
    </div>
    <?php endif; ?>
    


    <!-- The following prints a list of all tags associated with the item -->
    <?php if (metadata($item, 'has tags')): ?>
    <div id="item-tags" class="element">
        <h2>Tags</h2>
        <div class="element-text tags"><?php echo tag_string('item'); ?></div>
    </div>
    <?php endif; ?>

    <!-- If the item belongs to a collection, the following creates a link to that collection. -->
    <?php if (get_collection_for_item()): ?>
        <div id="collection" class="element">
            <h2>Collection</h2>
            <div class="element-text"><p><?php echo link_to_collection_for_item(); ?></p></div>
        </div>
    <?php endif; ?>

    <!-- The following prints a citation for this item. -->
    <div id="item-citation" class="element">
        <h2>Citation</h2>
        <div class="element-text"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></div>
    </div>

</div><!-- end secondary -->

<ul class="item-pagination navigation">
    <li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
    <li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
</ul>

<?php echo foot();
