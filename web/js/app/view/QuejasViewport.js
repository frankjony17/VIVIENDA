
Ext.define('VIV.view.QuejasViewport', {
    extend: 'Ext.container.Viewport',
    xtype: 'viewport-quejas',
    
    layout: 'border',
    bodyBorder: false,
    id: 'view-viewport-quejas',
    
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
                text: 'Quejas',
                scale: 'medium',
                iconCls: 'button-quejas',
                menu: Ext.create('Ext.menu.Menu', {
                    defaults: { padding: 5 },
                    width: 310,
                    closeAction : 'destroy',
                    items: [{
                        text: 'Listado <b>(Quejas)</b>',
                        iconCls: 'menu-quejas',
                        id: 'menu-quejas'
                    },{
                        text: 'Respuestas <b>(Seguimiento-Quejas)</b>',
                        iconCls: 'menu-respuestas',
                        id: 'menu-respuestas'
                    }]
                })
            },{
                xtype: 'tbseparator'
            },{
                xtype: 'tbseparator'
            },{
                xtype: 'tbseparator'
            },{
                text: 'Adicionar',
                scale: 'medium',
                iconCls: 'button-add-menu',
                menu: Ext.create('Ext.menu.Menu', {
                    defaults: { padding: 5 },
                    width: 250,
                    closeAction : 'destroy',
                    items: [{
                        text: '<b>Acciones</b>',
                        iconCls: 'menu-acciones',
                        id: 'menu-acciones-add'
                    }]
                })
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
            xtype: 'panel',
            border: true,
            bodyStyle: 'background-image:url(/images/square.gif);',
            id: 'center-panel-id'
        },{
            region: 'west',
            xtype: 'panel',
            lbar: [{
                iconCls: 'menu-respuestas',
                tooltip: 'Respuestas <b>(Seguimiento-Quejas)</b>.',
                id: 'respuestas-toolbar'
            }]
        },{
            region: 'south',
            items: Ext.create('VIV.view.StatusBarPanel')
        }];
        this.callParent(arguments);
    }
});