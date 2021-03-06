<?php

if (isset($_GET['f_id_auth_group'])) {
   $dg_form = new Form('inline', removeqsvar($cur_url, array('f_id_auth_group','last_action')).'&amp;last_action=edit_group');
   $dg_form->fieldset(true);

   $dg_form->legend(DEL);
   $dg_form->add('hidden', 'f_id_config_dynamic_dashboard')
           ->value($cur_dynamic_dashboard->id_config_dynamic_dashboard);

   $dg_form->add('hidden', 'f_id_auth_group')
           ->value($f_id_auth_group);

   $dg_form->add('text', 'f_group')
           ->readonly(true)
           ->value($cur_dynamic_dashboard_group->group);

   $dg_form->add('submit', 'f_delete_dynamic_dashboard_group')
           ->iType('delete')
           ->value(DEL);
} else {
   $dg_form = new Form('horizontal', removeqsvar($cur_url, array('f_id_auth_group','last_action')).'&amp;last_action=edit_group');
   $dg_form->fieldset(true);

   $dg_form->legend(ADD);

   $dg_form->add('hidden', 'f_id_config_dynamic_dashboard')
           ->value($cur_dynamic_dashboard->id_config_dynamic_dashboard);

   $dg_form->add('select','f_id_auth_group')
            ->options($all_group, 'id_auth_group', 'group')
            ->label(GROUP)
            ->labelGrid(IL_CSS)
            ->inputGrid(I_CSS);

   $dg_form->add('checkbox','f_group_manager')
           ->value('manager')
           ->label('Manager')
           ->inputGrid(C_CSS);

   $dg_form->add('submit', 'f_submit_dynamic_dashboard_group')
           ->iType('add')
           ->value(SUBMIT)
           ->labelGrid(SL_CSS)
           ->inputGrid(S_CSS);
}
echo $dg_form->bindForm();
?>
