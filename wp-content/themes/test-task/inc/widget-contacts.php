<?php

class Tt_Widget_Contacts extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'tt_widget_contacts',
            'TestTask - Widget contacts',
            [
                'name'        => 'TestTask - Widget contacts',
                'description' => 'Displays mail and address'
            ]
        );
    }

    public function form( $instance ) { ?>

        <p>
            <label for="<?php echo $this->get_field_id('id-mail'); ?>">
                Enter email:
            </label>
            <input
                id="<?php echo $this->get_field_id('id-mail'); ?>"
                type="text"
                name="<?php echo $this->get_field_name('mail'); ?>"
                value="<?php echo $instance['mail']; ?>"
                class="widefat"
            >
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('id-address'); ?>">
                Enter address:
            </label>
            <input
                id="<?php echo $this->get_field_id('id-address'); ?>"
                type="text"
                name="<?php echo $this->get_field_name('address'); ?>"
                value="<?php echo $instance['address']; ?>"
                class="widefat"
            >
        </p>

    <?php }

    public function widget( $args, $instance ) { ?>

        <div class="shape__info">
            <a href="mailto:<?php echo $instance['mail']; ?>" class="shape__mail"><?php echo $instance['mail']; ?></a>
            <address class="shape__address"><?php echo $instance['address']; ?></address>
        </div>

    <?php }

    public function update( $new_instance, $old_instance ){
        return $new_instance;
    }
}