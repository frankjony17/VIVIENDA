
Ext.define('VIV.view.admin.SeguridadMenu', {
    extend: 'Ext.menu.Menu',

    defaults: {
        padding: 5
    },
    width: 200,
    closeAction : 'destroy',
    
    items: [{
        text: '<b>Roles</b>',
        iconCls: 'tree-roles',
        id: 'tree-roles'
    },{
        text: '<b>Usuario</b>',
        iconCls: 'tree-usuarios',
        id: 'tree-usuarios'
    }]
});