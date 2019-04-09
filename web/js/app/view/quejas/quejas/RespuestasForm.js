
Ext.define('VIV.view.quejas.quejas.RespuestasForm', {
    extend: 'Ext.window.Window',
    xtype: 'form-respuestas',

    title: 'Responder Queja',
    iconCls: 'menu-respuestas',
    layout: 'fit',
    modal: true,
    resizable: false,
    width: 780,

    initComponent: function () {
        var me = this;
        this.items = [{
            xtype: 'form',
            padding: '10 10 10 10',
            autoScroll: true,
            frame: false,
            fieldDefaults: {
                anchor: '100%',
                labelAlign: 'top'
            },
            items:[{
                xtype: 'fieldset',
                layout: 'anchor',
                items: [{
                    xtype: 'container',
                    border: false,
                    layout: 'anchor',
                    items: [{
                        xtype: 'textareafield',
                        fieldLabel: 'Respuesta',
                        name: 'respuesta',
                        grow: true,
                        flex: 1,
                        afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>']
                    }, {
                        xtype: 'textareafield',
                        fieldLabel: 'Observación',
                        name: 'observacion',
                        grow: true,
                        flex: 1,
                        afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>']
                    }]
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