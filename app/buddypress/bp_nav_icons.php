<?php

add_action( 'bp_init', 'my_picto' );
function my_picto(){
    global $bp;
    $bp->bp_nav['activity']['name'] = "<i class='fa fa-list'></i> " . $bp->bp_nav['activity']['name'];
    $bp->bp_nav['profile']['name'] = "<i class='fa fa-user'></i> " . $bp->bp_nav['profile']['name'];
    //$bp->bp_nav['notifications']['name'] = "<i class='fa fa-bullhorn'></i>" . $bp->bp_nav['notifications']['name'];
    $bp->bp_nav['settings']['name'] = "<i class='fa fa-cog'></i> " . $bp->bp_nav['settings']['name'];
    $bp->bp_nav['friends']['name'] = "<i class='fa fa-child'></i> " . $bp->bp_nav['friends']['name'];
    //$bp->bp_nav['groups']['name'] = "<i class='fa fa-users'></i> " . $bp->bp_nav['groups']['name'];
    //$bp->bp_nav['messages']['name'] = "<i class='fa fa-envelope'></i> " . $bp->bp_nav['messages']['name'];

    $bp->bp_nav['profile']['position'] = 0;
}
?>
