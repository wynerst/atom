<?php decorate_with('layout_1col') ?>
<?php use_helper('Date') ?>

<?php slot('title') ?>
  <div class="multiline-header">
    <h1 aria-describedby="results-label"><?php echo __('Showing %1% results', array('%1%' => $pager->getNbResults())) ?></h1>
    <span class="sub" id="results-label"><?php echo __('Rights holder') ?></span>
  </div>
<?php end_slot() ?>

<?php slot('before-content') ?>

  <section class="header-options">
    <div class="row">
      <div class="span6">
        <?php echo get_component('search', 'inlineSearch', array(
          'label' => __('Search rights holder'))) ?>
      </div>

      <div class="pickers">
        <?php echo get_partial('default/sortPickers',
          array(
            'options' => array(
              'lastUpdated' => __('Date modified'),
              'alphabetic' => __('Name'),
              'identifier' => __('Identifier')))) ?>
      </div>
    </div>
  </section>

<?php end_slot() ?>

<?php slot('content') ?>
  <table class="table table-bordered sticky-enabled">
    <thead>
      <tr>
        <th>
          <?php echo __('Name') ?>
        </th>
        <?php if ('alphabetic' != $sf_request->sort): ?>
          <th>
            <?php echo __('Updated') ?>
          </th>
        <?php endif; ?>
      </tr>
    </thead><tbody>
      <?php foreach ($pager->getResults() as $item): ?>
        <tr>
          <td>
            <?php echo link_to(render_title($item), array($item, 'module' => 'rightsholder')) ?>
          </td>
          <?php if ('alphabetic' != $sf_request->sort): ?>
            <td>
              <?php echo format_date($item->updatedAt, 'f') ?>
            </td>
          <?php endif; ?>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php end_slot() ?>

<?php slot('after-content') ?>

  <?php echo get_partial('default/pager', array('pager' => $pager)) ?>

  <section class="actions">
    <ul>
      <li><?php echo link_to(__('Add new'), array('module' => 'rightsholder', 'action' => 'add'), array('class' => 'c-btn')) ?></li>
    </ul>
  </section>

<?php end_slot() ?>
