var first = document.querySelector('#arg1');
var second = document.querySelector('#arg2');
var button = document.querySelector('#button');
var wynik = document.querySelector('.wynik');

if (window.Worker) 
{
	var myWorker = new Worker("worker.js");

	button.onclick=function() 
	{//Obs�uga wys�ania danych do w�tku; informacja w konsoli
		myWorker.postMessage([first.value,second.value]); 
		console.log('Wys�ano do workera');
	}

	myWorker.onmessage = function(e) 
	{//Odebranie danych z w�tku i ich przetworzenie; info w konsoli
		wynik.textContent = e.data;
		console.log('Odebrano od workera');
	};
}
