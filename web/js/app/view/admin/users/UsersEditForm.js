
Ext.define('VIV.view.admin.users.UsersEditForm', {
    extend: 'Ext.window.Window',
    xtype: 'users-edit-form',

    title: 'Editar usuario',
    iconCls: 'fa fa-users',
    buttonAlign: 'center',
    layout: 'fit',
    resizable: false,
    closable: false,
    modal: true,
    width: 420,
    headerPosition: 'bottom',

    initComponent: function () {
        var me = this;
        me.items = [{
            xtype: 'form',
            padding: '10 10 10 10',
            border: false,
            style: 'background-color: #fff;',
            fieldDefaults: {
                labelAlign: 'top',
                margin: 2
            },
            items: [{
                xtype: 'textfield',
                fieldLabel: 'Usuario',
                emptyText: 'Alias del usuario.',
                anchor: '100%',
                maskRe: /[aA-zZ\.\áéíóúñÁÉÍÓÚÑ]/,
                regex: /[aA-zZ]/,
                maxLength: 23,
                allowBlank: false
            }]
        }];
        me.tools = [{
            xtype: 'button',
            text: 'Salvar',
            iconCls: 'fa fa-check'
        },{
            xtype: 'tbspacer', width: 5
        },{
            xtype: 'button',
            text: 'Cancelar',
            iconCls: 'fa fa-times',
            listeners: {
                click: function () { 
                    me.close();
                }
            }
        }];
        me.callParent(arguments);
    }
});