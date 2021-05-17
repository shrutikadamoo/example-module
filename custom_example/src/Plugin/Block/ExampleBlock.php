<?php

namespace Drupal\custom_example\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Hello' Block.
 *
 * @Block(
 *   id = "example_block",
 *   admin_label = @Translation("Example block"),
 *   category = @Translation("Examples"),
 * )
 */
class ExampleBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $renderable = [
        '#theme' => 'example_block',
				'#title' => 'Example Block',
				'#site_slogan' => \Drupal::config('system.site')->get('name'),
				'#description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'#attached' => [
					'library' => [
						'custom_example/example_library',
					],
				],
			];
      return $renderable;
  }

}
