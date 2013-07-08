<?php
$this->title()->set('Contact Us');
?>
<div class="row-fluid">
  <div class="span12">Contact Us</div>
</div>
<div class="row-fluid">
  <div class="span12">
    <form method="post" action="<?php echo $this->route('example_package_contactform'); ?>" enctype="multipart/form-data" >
        <table cellpadding="0" cellspacing="0">
            <tr>
                <td>Name : </td>
                <td>
                <?php
                    echo $this->field($this->form->get('name'));
                    $data = [
                        'form' => $this->form,
                        'name' => 'name'
                    ];
                    echo $this->partial('_field', $data);
                ?>
                </td>
            </tr>
            <tr>
                <td>State : </td>
                <td>
                <?php
                    echo $this->field($this->form->get('state'));
                    $data = [
                        'form' => $this->form,
                        'name' => 'state'
                    ];
                    echo $this->partial('_field', $data);
                ?>
                </td>
            </tr>
            <tr>
                <td>Message : </td>
                <td>
                <?php
                    echo $this->field($this->form->get('message'));
                    $data = [
                        'form' => $this->form,
                        'name' => 'message'
                    ];
                    echo $this->partial('_field', $data);
                ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                <?php
                echo $this->field($this->form->get('send'));
                //echo $this->input(['type' => 'submit', 'name' => 'submit', 'value' => 'send']);
                ?>
                </td>
            </tr>
        </table>
    </form>
  </div><!--/span-->
</div><!--/row-->
