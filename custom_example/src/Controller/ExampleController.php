<?php
namespace Drupal\custom_example\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * An example controller. Custom page
 */
class ExampleController extends ControllerBase {

  /**
   * Returns a render-able array for a test page.
   */
  public function content() {
    $build = [
      '#markup' => $this->t('Hello World!'),
    ];
    return $build;
  }
}