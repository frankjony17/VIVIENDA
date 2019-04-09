
Ext.define('VIV.view.nomenclador.departamento.DepartamentoForm', {
    extend: 'Ext.window.Window',
    xtype: 'form-departamento',

    iconCls: '',
    layout: 'fit',
    width: 640,
    resizable: false,
    modal: true,

    initComponent: function () {
        var me = this;

        this.items = [{
            xtype: 'form',
            url: '../nomenclador/departamento/add-edit',
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
                layout: 'hbox',
                items: [{
                    xtype: 'textfield',
                    fieldLabel: 'Nombre',
                    emptyText: 'Nombre',
                    name: 'nombre',
                    /*maskRe: MASKRe,
                    regex: REGEx,*/
                    maxLength: 46,
                    allowBlank: false,
                    flex: 1,
                    afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>'],
                    margin: '0 5 0 0'
                },{
                    xtype: 'textfield',
                    fieldLabel: 'Telefonos',
                    emptyText: 'Telefonos',
                    name: 'telefonos',
                    /*maskRe: MASKRe,
                    regex: REGEx,*/
                    maxLength: 76,
                    allowBlank: false,
                    flex: 1,
                    afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>']
                }]
            },{
                xtype: 'container',
                border: false,
                layout: 'anchor',
                items: [{
                    xtype: 'textfield',
                    fieldLabel: 'Descripcion',
                    emptyText: 'Descripcion',
                    name: 'descripcion',
                    /*maskRe: MASKRe,
                    regex: REGEx,*/
                    maxLength: 126,
                    allowBlank: true,
                    flex: 1,
                    afterLabelTextTpl: false
                }, {
                    xtype: 'hiddenfield',
                    name: 'id'
                }]
            }]
        }];
        this.buttons = [{
            text: me.btnText,
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