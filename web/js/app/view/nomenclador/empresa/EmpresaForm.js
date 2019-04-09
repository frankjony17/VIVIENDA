
Ext.define('VIV.view.nomenclador.empresa.EmpresaForm', {
    extend: 'Ext.window.Window',
    xtype: 'form-empresa',

    iconCls: '',
    layout: 'fit',
    width: 640,
    resizable: false,
    modal: true,

    initComponent: function () {
        var me = this;

        this.items = [{
            xtype: 'form',
            url: '../nomenclador/empresa/add-edit',
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
                    maxLength: 55,
                    allowBlank: false,
                    flex: 1,
                    afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>'],
                    margin: '0 5 0 0'
                },{
                    xtype: 'textfield',
                    fieldLabel: 'Codigo',
                    emptyText: 'Codigo',
                    name: 'codigo',
                    /*maskRe: MASKRe,
                    regex: REGEx,*/
                    maxLength: 43,
                    allowBlank: false,
                    flex: 1,
                    afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>']
                }]
            },{
                xtype: 'container',
                border: false,
                layout: 'hbox',
                items: [{
                    xtype: 'textfield',
                    fieldLabel: 'Telefonos',
                    emptyText: 'Telefonos',
                    name: 'telefonos',
                    /*maskRe: MASKRe,
                    regex: REGEx,*/
                    maxLength: 76,
                    allowBlank: true,
                    flex: 1,
                    afterLabelTextTpl: false,
                    margin: '0 5 0 0'
                },{
                    xtype: 'textfield',
                    fieldLabel: 'Calle',
                    emptyText: 'Calle',
                    name: 'calle',
                    /*maskRe: MASKRe,
                    regex: REGEx,*/
                    maxLength: 43,
                    allowBlank: true,
                    flex: 1,
                    afterLabelTextTpl: false
                }]
            },{
                xtype: 'container',
                border: false,
                layout: 'anchor',
                items: [{
                    xtype: 'textfield',
                    fieldLabel: 'Entre',
                    emptyText: 'Entre',
                    name: 'entre',
                    /*maskRe: MASKRe,
                    regex: REGEx,*/
                    maxLength: 43,
                    allowBlank: true,
                    flex: 1,
                    afterLabelTextTpl: false
                },{
                    xtype: 'numberfield',
                    fieldLabel: 'Numero',
                    name: 'numero',
                    value: 0,
                    minValue: 0,
                    maxValue: 99,
                    flex: 1,
                    allowBlank: true,
                    afterLabelTextTpl: false
                },{
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