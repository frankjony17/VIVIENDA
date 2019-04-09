
Ext.define('VIV.view.admin.users.UsersForm', {
    extend: 'Ext.window.Window',
    xtype: 'form-users',

    iconCls: 'fa fa-users',
    layout: 'fit',
    width: 640,
    resizable: false,
    modal: true,

    initComponent: function () {
        var me = this;

        this.items = [{
            xtype: 'form',
            url: '../admin/users/add',
            padding: '10 10 10 10',
            frame: false,
            fieldDefaults: {
                anchor: '100%',
                allowBlank: false,
                labelAlign: 'top'
            },
            items:[{
                xtype: 'container',
                border: false,
                layout: 'anchor',
                items: [{
                    xtype: 'textfield',
                    fieldLabel: 'Nombre de usuario',
                    emptyText: 'fdfdfdfdfdfdf',
                    maskRe: /[aA-zZ\.\áéíóúñÁÉÍÓÚÑ]/,
                    regex: /[aA-zZ]/,
                    name: 'username',
                    maxLength: 23,
                    allowBlank: false,
                    flex: 1,
                    afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>'],
                }]
            },{
                xtype: 'container',
                border: false,
                layout: 'hbox',
                items: [{
                    xtype: 'textfield',
                    fieldLabel: 'Contraseña',
                    name: 'password',
                    inputType: 'password',
                    maxLength: 62,
                    allowBlank: false,
                    flex: 1,
                    afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>'],
                    margin: '0 5 0 0'
                },{
                    xtype: 'textfield',
                    fieldLabel: 'Repetir Contraseña',
                    inputType: 'password',
                    maxLength: 62,
                    allowBlank: false,
                    flex: 1,
                    afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>']
                }]
            },{
                xtype: 'hiddenfield',
                name: 'id'
            }]
        }];
        this.buttons = [{
            text: 'Salvar',
            iconCls: 'fa fa-check'
        },{
            text: 'Cancelar',
            iconCls: 'fa fa-times',
            handler: function() {
                me.close();
            }
        }];
        this.callParent(arguments);
    }
});