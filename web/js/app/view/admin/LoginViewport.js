
Ext.define('VIV.view.admin.LoginViewport', {
    extend: 'Ext.container.Viewport',
    xtype : 'viewport-admin',
    
    layout: 'border',
    bodyBorder: false,
    id: 'view-viewport-admin',
    
    initComponent: function() {
        this.items = [{
            region: 'center',
            xtype: 'panel',
            bodyStyle: 'background-image:url(/images/square.gif);',
            id: 'center-panel-id',
            items: Ext.create('Ext.window.Window', {
                width: '25%',
                height: 175,
                layout: 'fit',
                autoShow: true,
                plain: true,
                resizable: false,
                closable: false,
                draggable: false,
                items: [{
                    xtype: 'form',
                    url: '../login_check',
                    standardSubmit: true,
                    height: 200,
                    bodyPadding: 15,
                    fieldDefaults: {
                        labelStyle: 'font-weight:bold; font-size:14px; text-shadow: 0 1px 0 #fff;',
                        fieldStyle: 'font-size:14px;',
                        height: 35,
                        anchor: '100%',
                        allowBlank: false
                    },
                    defaultType: 'textfield',
                    items: [{
                        allowBlank: false,
                        fieldLabel: 'Usuario',
                        emptyText: 'Alias del usuario',
                        enableKeyEvents: true,
                        selectOnFocus: true,
                        maskRe: /[a-z\.\ñ\á\é\í\ó\ú]/,
                        regex: /[a-z]/,
                        id: 'login-textfield-usuario',
                        name: '_username'
                    },{
                        allowBlank: false,
                        fieldLabel: 'Contraseña',
                        emptyText: 'Contraseña',
                        inputType: 'password',
                        id: 'login-textfield-password',
                        name: '_password'
                    }],
                    buttons: [{ text:'Iniciar Sesión', iconCls: 'fa fa-key', width: 130, height: 35, id: 'login-button' }]
                }]
            })
        }];
        this.callParent(arguments);
    }
});