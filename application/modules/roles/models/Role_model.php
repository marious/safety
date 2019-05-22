<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Role_model extends MY_Model
{
    protected $table_name = 'groups';



    public function get_roles()
    {
        // $query = "
        //     SELECT groups.id, groups.name, groups.description,  permissions.name as permission_name
        //     FROM groups 
        //     LEFT OUTER JOIN permission_group
        //     ON permission_group.group_id = groups.id
        //     LEFT OUTER JOIN permissions 
        //     ON permission_group.permission_id = permissions.id 
        //     GROUP BY groups.id

        // ";

        $g_query = $this->db->select('id, name, description')->from('groups')->get();
        if ($g_query->num_rows()) 
        {
            $groups = $g_query->result();
            foreach ($groups as $group) {

            }
        }
    }

    public function get_permissions_for_group($group_id)
    {
        $query = "SELECT permissions.name, groups.id
                    FROM permissions 
                    INNER JOIN permission_group 
                    ON permission_group.permission_id = permissions.id 
                    INNER JOIN groups 
                    ON permission_group.groupd_id = groups.id 
        ";
    }
}