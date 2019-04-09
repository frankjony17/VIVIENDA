
Ext.define('VIV.view.DespachoViewport', {
    extend: 'Ext.container.Viewport',
    xtype: 'viewport-despacho',
    
    layout: 'border',
    bodyBorder: false,
    id: 'view-viewport-despacho',
    
    initComponent: function() {
        this.items = [{
            region: 'north',
            xtype: 'panel',
            tbar: [{
                xtype: 'image',
                src: '../../images/admin/home.png',
                width: 32,
                height: 32
            },{
                xtype: 'tbfill'
            },{
                text: 'Salir',
                scale: 'medium',
                iconCls: 'logout',
                id: 'admin-logout'
            },{
                tooltip: 'Ayuda!!!!!!!!!!!!',
                scale: 'medium',
                iconCls: 'fa fa-info',
                action: 'help'
            }]
        },{
            region: 'center',
            xtype: 'grid-despacho',
            items: Ext.create('VIV.view.despacho.DespachoGrid'),
            border: true
        },{
            region: 'west',
            xtype: 'panel',
            lbar: [{
                xtype: 'tbfill'
            }]
        },{
            region: 'south',
            items: Ext.create('VIV.view.StatusBarPanel'),
            id: 'south-panel-id'
        }];
        this.callParent(arguments);
    }
});