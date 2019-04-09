
Ext.define('VIV.store.admin.UsersStore', {
    extend: 'Ext.data.Store',
    
    fields: [ 'id', 'username', 'roles' ],
    autoLoad: true,
    sorters: 'username',
    groupField: 'roles',
    proxy : {
        type : 'ajax',
        url: '../admin/users/list',
        reader : {
            type            : 'json',
            root            : 'data',
            totalProperty   : 'total',
            successProperty : 'success'
        }
    }
});