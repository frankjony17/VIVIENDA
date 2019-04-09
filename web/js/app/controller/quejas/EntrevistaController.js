
Ext.define('VIV.controller.quejas.EntrevistaController', {
    extend: 'Ext.app.Controller',

    control: {
        '#admin-logout': { click: "logout" },
        /* Grid */
        'grid-entrevista': {
            resize: "resize",
            afterrender: "afterRenderGrid",
            celldblclick: "dblclick",
            itemcontextmenu: "itemcontextmenu"
        },
        'grid-quejas': {
            resize: "resize"
        },
        'grid-entrevista [text=Adicionar]': {
            click: "showWindows"
        },
        'grid-entrevista [text=Eliminar]': {
            click: "confirmRemove"
        },
        /* Form */
        'form-entrevista': {
            afterrender: "afterRenderForm"
        },
        'form-entrevista [action=salvar]': {
            click: "isValid"
        },
        'form-entrevista [action=editar]': {
            click: "isValid"
        },
        'form-queja [text=Salvar]': {
            click: "addQueja"
        }
    },
    resize: function (grid){
        var centerpanel = Ext.getCmp('center-panel-id');
        grid.setHeight(centerpanel.getHeight());
    },
    afterRenderGrid: function (grid) {
        this.grid = grid;
        this.store = grid.getStore();
    },
    afterRenderForm: function (win) {
        this.win = win;
        this.form = win.down('form');
    },
    showWindows: function () {
        Ext.create('VIV.view.quejas.entrevista.EntrevistaForm', { actionBtn: 'salvar' }).show();
    },
    /* ADD-ENTREVISTA */
    isValid: function () {
        if (this.form.getForm().isValid()) {
            this.submitClick();
        } else {
            this.message('Atención?', '<b><span style="color:red;">Formulario no válido</span></b>, verifique las casillas en <b><span style="color:red;">rojo</span></b>.', Ext.Msg.QUESTION);
        }
    },
    /* EDITAR-ENTREVISTA */
    dblclick: function (view, td, cellIndex, record) {
        var win = Ext.create('VIV.view.quejas.entrevista.EntrevistaForm',{ actionBtn: 'editar' }),
            form = win.down('form');
        form.loadRecord(record);
        win.show();
    },
    submitClick: function () {
        var me = this;
        this.form.submit({
            success: function(form, action) {
                me.form.down('[name=id]').setValue(action.response.responseText);
                me.form.up('window').close();
                me.store.load();
                Ext.toast('Operación realizada exitosamente.', 'Actualización OK');
            },
            failure: function(form, action) {
                if (action.response.responseText.length < 20 && action.response.responseText !== 'unique') {
                    me.form.down('[name=id]').setValue(action.response.responseText);
                    me.form.up('window').close();
                    me.store.load();
                    Ext.toast('Operación realizada exitosamente.', 'Actualización OK');
                } else if (action.response.responseText === 'unique') {
                    me.message('Atención', 'El Código ya existe, <b>Verifiquelo!!!</b>', Ext.Msg.INFO);
                } else {
                    me.message('Error?', action.response.responseText, Ext.Msg.ERROR);
                }
            }
        });
    },
    /* MENU-ENTREVISTA */
    itemcontextmenu: function (view, record, item, index, e) {
        var boolean = false; this.record = record;
        if (record.get('queja')) {
            boolean = true;
        }
        var me = this, menu = Ext.create('Ext.menu.Menu', {
            width: 300,
            closeAction: 'destroy',
            items: [{
                text: 'Crear <b>(QUEJA</b>)',
                iconCls: 'queja',
                tooltip: 'Crear Queja.',
                disabled: boolean,
                handler: me.showQueja
            },'-',{
                text: 'Eliminar <b>(Entrevista)</b>',
                iconCls: 'delete-row',
                disabled: boolean,
                tooltip: 'Eliminar Entrevista.',
                me: me,
                handler: me.confirmRemove
            },'-',{
                text: 'Reporte <b>(PDF)</b>',
                iconCls: 'pdf',
                tooltip: 'Generar Modelo (Entrevista).',
                me: me,
                handler: me.pdf
            }]
        });
        menu.showAt(e.getXY());
        e.stopEvent();
    },
    /* ELIMINAR-ENTREVISTA */
    confirmRemove: function (item) {
        var me = item.me;
        Ext.MessageBox.confirm('Confirmación', 'Desea eliminar los registro seleccionado?', confirm, this);
        function confirm (btn) {
            if (btn === 'yes') {
                Ext.Ajax.request({
                    url: '../quejas/entrevista/remove',
                    params: { id: me.record.get('id') },
                    success: function(response) {
                        if (response.responseText === '') {
                            me.store.load();
                        } else {
                            me.message('Error', response.responseText, Ext.Msg.ERROR);
                        }
                    },
                    failure: function(response){
                        me.message('Error', response.responseText, Ext.Msg.ERROR);
                    }
                });
            }
        }
    },
    /* QUEJA */
    showQueja: function () {
        Ext.create('VIV.view.quejas.quejas.QuejaForm', { btnText: 'Salvar' }).show();
    },
    addQueja: function (btn) {
        var me = this, win = btn.up('window'), form = win.down('form');
        if (form.getForm().isValid()) {
            ajax(form.getForm().getValues());
        } else {
            this.message('Atención?', '<b><span style="color:red;">Formulario no válido</span></b>, verifique las casillas en <b><span style="color:red;">rojo</span></b>.', Ext.Msg.QUESTION);
        }
        function ajax (record) {
            Ext.Ajax.request({
                url: '../quejas/add-edit',
                params: {
                    tipo:  record.tipo,
                    fecha:  record.fecha,
                    entrevista: me.record.get('id')
                },
                success: function(response) {
                    if (response.responseText === '') {
                        me.store.load();
                        win.close();
                    } else {
                        me.message('Error', response.responseText, Ext.Msg.ERROR);
                    }
                },
                failure: function(response){
                    me.message('Error', response.responseText, Ext.Msg.ERROR);
                }
            });
        }
    },
    /* SHOW-MESSAGE */
    message: function (title, message, icon) {
        Ext.Msg.show({ title: title, message: message, buttons:Ext.MessageBox.OK, icon: icon });
    },
    /* Logout */
    logout: function () {
        location.href = '../../app.php/logout';
    },
    /* PDF */
    pdf: function (item) {
        var me = item.me;
        Ext.Ajax.request({
            url: '../reporte/quejas/entrevista',
            params: { id: me.record.get('id') },
            success: function (response) {
                Ext.create('Ext.window.Window',{
                    title: 'Modelo de Entrevista (PDF)',
                    width: 900,
                    height: 600,
                    maximizable: true,
                    plain: true,
                    autoShow: true,
                    items: {
                        xtype: 'component',
                        autoEl: {
                            tag: 'iframe',
                            style: 'height: 100%; width: 100%; border: none',
                            src: "../"+ response.responseText
                        }
                    }
                });
            }
        });
    }
});