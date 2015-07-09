function imprimeGrafica(){
	var ficha=document.getElementById('contenedor');
	var ventimp=window.open(' ','popimpr');
	ventimp.document.write(ficha.innerHTML);
	ventimp.document.close();
	ventimp.print();
	ventimp.close();
}