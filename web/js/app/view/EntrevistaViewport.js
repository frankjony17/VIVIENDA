
Ext.define('VIV.view.EntrevistaViewport', {
    extend: 'Ext.container.Viewport',
    xtype: 'viewport-entrevista',
    
    layout: 'border',
    bodyBorder: false,
    id: 'view-viewport-entrevista',
    
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
                text: 'Entrevistas',
                scale: 'medium',
                iconCls: 'button-entrevistas',
                menu: Ext.create('Ext.menu.Menu', {
                    defaults: { padding: 5 },
                    width: 250,
                    closeAction : 'destroy',
                    items: [{
                        text: '<b>Listado de Clientes</b>',
                        iconCls: 'menu-clientes',
                        id: 'menu-clientes'
                    },{
                        text: '<b>Listado de Entrevistas</b>',
                        iconCls: 'menu-entrevistas',
                        id: 'menu-entrevistas'
                    }]
                })
            },{
                text: 'Quejas',
                scale: 'medium',
                iconCls: 'button-quejas',
                menu: Ext.create('Ext.menu.Menu', {
                    defaults: { padding: 5 },
                    width: 250,
                    closeAction : 'destroy',
                    items: [{
                        text: '<b>Listado de Quejas</b>',
                        iconCls: 'menu-quejas',
                        id: 'menu-quejas'
                    },{
                        text: '<b>Quejas rechazadas</b>',
                        iconCls: 'menu-quejas-rechazada',
                        id: 'menu-quejas-rechazada'
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
                        text: '<b>Clientes</b>',
                        iconCls: 'menu-clientes',
                        id: 'menu-clientes-add'
                    },{
                        text: '<b>Entrevistas</b>',
                        iconCls: 'button-entrevistas',
                        id: 'menu-entrevista-add'
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
                iconCls: 'entrevista',
                tooltip: 'Realizar Entrevista.',
                id: 'entrevista-toolbar'
            }]
        },{
            region: 'south',
            items: Ext.create('VIV.view.StatusBarPanel')
        }];
        this.callParent(arguments);
    }
});