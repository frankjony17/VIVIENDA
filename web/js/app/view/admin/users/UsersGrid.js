
Ext.define('VIV.view.admin.users.UsersGrid', {
    extend: 'Ext.grid.Panel',
    xtype: 'grid-users',

    width: '100%',
    selType: 'checkboxmodel',
    autoScroll: true,

    features: [{
        groupHeaderTpl: 'Roles: {name}',
        ftype: 'groupingsummary',
        collapsible: true
    }],
    initComponent: function() {
        var me = this; // Scope from component 
        // Store 
        me.store = Ext.create('VIV.store.admin.UsersStore');
        // CSS a los usuarios que no estan activos o no tienen roles activos.
        me.viewConfig = {
            getRowClass: function(record) {
                if(record.get('is_active') === false) {
                    return 'x-grid-row-estado-color';
                } else if(record.get('roles') === '') {
                    return 'x-grid-row-no-roles-color';
                }
            }
        };
        // Column Model
        me.columns = [{
            xtype: 'rownumberer',
            text: 'No',
            width: 40,
            align: 'center'
        },{
            text: 'Id',
            dataIndex: 'id',
            width: 35,
            hidden: true
        },{
            text: 'Alias',
            dataIndex: 'username',
            flex: 1
        },{
            text: 'Roles',
            dataIndex: 'roles',
            flex: 3
        }];
        me.tbar = [{
            text: 'Adicionar',
            tooltip: 'Adicionar usuario',
            iconCls: 'fa fa-user-plus'
        },{
            text: 'Eliminar',
            tooltip: 'Eliminar usuario',
            iconCls: 'fa fa-user-times'
        },'->',{
            tooltip: 'Ayuda acerca de usuarios.',
            iconCls: 'fa fa-info'
        }]; 
        me.callParent(arguments);
    }
});