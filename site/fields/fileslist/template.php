<input class="[ js-selector-storage ]" type="hidden" name="<?= $field->name() ?>" id="<?= $field->name() ?>" value="<?= implode(',', $field->value()) ?>" />

<?php if ($field->files()->count() > 0): ?>
    <div class="input input-with-items">

        <?php foreach ($field->files() as $file): ?>
            <div id="<?= $field->itemId($file) ?>" class="item item-with-image [ selector-item js-selector-item ]" data-file="<?= $file->filename() ?>" <?= r($field->isInValue($file), 'data-checked="true"') ?> >
                <div class="item-content">
                    <?php if ($file->type() == 'image'): ?>
                        <figure class="item-image">
                            <?php if (version_compare(panel()->version(), '2.2', '>=')): ?>
                                <a class="btn btn-with-icon" data-context="<?= purl($file, 'context') ?>" href="#options" title="<?= l('pages.show.subpages.edit') ?>">
                                    <?= thumb($file, array('width' => 128, 'height' => 128, 'crop' => true)) ?>
                                </a>
                            <?php else: ?>
                                <a class="btn btn-with-icon" href="<?= purl($file, 'show') ?>" title="<?= l('pages.show.subpages.edit') ?>">
                                    <?= thumb($file, array('width' => 128, 'height' => 128, 'crop' => true)) ?>
                                </a>
                            <?php endif ?>
                        </figure>
                    <?php else: ?>
                        <figure class="item-image item-filetype">
                            <a class="btn btn-with-icon" href="<?= purl($file, 'show') ?>" title="<?= l('pages.show.subpages.edit') ?>">
                                <?= strtoupper($file->extension()) ?>
                            </a>
                        </figure>
                    <?php endif ?>
                    <div class="item-info">
                        <div class="fix">
                           <a data-context="<?= purl($file, 'context') ?>" href="#options" title="<?= l('pages.show.subpages.edit') ?>">
															<strong class="item-title">
																	<?= $file->filename() ?>
															</strong>
														</a>
                            <small class="item-meta marginalia">
                                <?= $file->type() ?> / <?= $file->niceSize() ?>
                                <?php if (($file->type() == 'image') and ($file->extension() != 'svg')): ?>
                                    / <?= $file->width() ?> x <?= $file->height() ?>
                                <?php endif ?>
                            </small>
                        </div>
                    </div>
                </div>

            </div>
        <?php endforeach ?>

    </div>
<?php else: ?>
    <div class="field field-is-readonly field-with-icon">
        <div class="field-content">
            <input class="input input-is-readonly" type="text" readonly placeholder="" value="<?= l::get('selector.empty', 'No matching files yet.') ?>">
            <div class="field-icon">
                <i class="icon fa fa-info"></i>
            </div>
        </div>
    </div>
<?php endif ?>
