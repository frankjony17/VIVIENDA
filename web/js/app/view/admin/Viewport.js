
Ext.define('VIV.view.admin.Viewport', {
    extend: 'Ext.container.Viewport',
    xtype: 'viewport-admin',
    
    layout: 'border',
    bodyBorder: false,
    id: 'view-viewport-admin',
    
    initComponent: function() {
        this.items = [{
            region: 'north',
            xtype: 'panel',
            tbar: [{
                xtype: 'image',
                src: '../images/admin/home.png',
                width: 32,
                height: 32
            },{
                text: 'Nomencladores',
                scale: 'medium',
                tooltip: 'Gestionar los nomencladores de Vivienda.',
                iconCls: 'nomencladores',
                menu: Ext.create('VIV.view.admin.NomencladorMenu')
            },{
                text: 'Seguridad',
                scale: 'medium',
                tooltip: 'Gestionar la seguridad del sistema.',
                iconCls: 'seguridad',
                menu: Ext.create('VIV.view.admin.SeguridadMenu')
            },{
                xtype: 'tbfill'
            },{
                text: 'Salir',
                scale: 'medium',
                iconCls: 'logout',
                id: 'admin-logout'
            }]
        },{
            region: 'center',
            xtype: 'panel',
            border: true,
            bodyStyle: 'background-image:url(/images/square.gif);',
            id: 'center-panel-id'
        },{
            region: 'west',
            xtype: 'panel',
            lbar: [{
                iconCls: 'empresa',
                id: 'empresa-toolbar'
            },{
                iconCls: 'trabajador',
                id: 'trabajador-toolbar'
            },'-',{
                iconCls: 'tree-usuarios',
                id: 'usuarios-toolbar'
            }]
        },{
            region: 'south',
            items: Ext.create('VIV.view.StatusBarPanel')
        }];
        this.callParent(arguments);
    }
});