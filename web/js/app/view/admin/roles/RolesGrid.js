
Ext.define('VIV.view.admin.roles.RolesGrid', {
    extend: 'Ext.grid.Panel',
    xtype: 'roles-grid',

    width: '100%',
    border: false,
    autoScroll: true,
    
    features: [{
        groupHeaderTpl: 'Modulo: {name}',
        ftype: 'groupingsummary',
        collapsible: false
    }],
    initComponent: function() {
        var me = this; // Ambito del componente.
        // Store
        me.store = Ext.create('VIV.store.admin.RolesStore');
        // Modelo de columna
        me.columns = [{
            xtype : 'rownumberer',
            text  : 'No',
            width : 40,
            align : 'center'
        }, {
            text: 'Id',
            dataIndex: 'id',
            width: 35,
            hidden: true
        }, {
            text: 'Roles',
            dataIndex: 'role',
            flex: 1
        }];
        // Carga nuestra configuaración y se la pasa al componente padre.
        me.callParent(arguments);
    }
});