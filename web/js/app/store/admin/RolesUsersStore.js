
Ext.define('VIV.store.admin.RolesUsersStore', {
    extend: 'Ext.data.Store',
    
    fields: ['id', 'name', 'role', 'estado'],
    
    sorters: 'name',
    groupField: 'name',
    
    proxy : {
        type : 'ajax',
        url: '../admin/roles/list_roles_users',
        reader : {
            type            : 'json',
            root            : 'data',
            totalProperty   : 'total',
            successProperty : 'success'
        }
    }
});