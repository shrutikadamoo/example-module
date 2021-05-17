<?php

namespace Drupal\custom_example\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class FormExample.
 */
class ExampleForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'form_example';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['first_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('First name'),
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
      '#ajax' => [
        'event' => 'change',
        'callback' => '::changinglastname'
      ]

    ];
    $form['last_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Last name'),
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
      
    ];
    $form['dob'] = [
      '#type' => 'date',
      '#title' => $this->t('DOB'),
      '#weight' => '0',
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    foreach ($form_state->getValues() as $key => $value) {
      if (strlen($value) < 3) {
        $form_state->setErrorByName('first_name', $this->t('The Name is too short.'));
      }
    }
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
      \Drupal::messenger()->addMessage($key . ': ' . ($key === 'text_format'?$value['value']:$value));
    }
  }

  public function changinglastname(array &$form, FormStateInterface $form_state){
    $value = $form_state->getValue('first_name');
    $form['last_name']['#value'] = $value;
    return $form['last_name'];
  }

}
