var first = document.querySelector('#arg1');
var second = document.querySelector('#arg2');
var button = document.querySelector('#button');
var wynik = document.querySelector('.wynik');

if (window.Worker) 
{
	var myWorker = new Worker("worker.js");

	button.onclick=function() 
	{//Obs³uga wys³ania danych do w¹tku; informacja w konsoli
		myWorker.postMessage([first.value,second.value]); 
		console.log('Wys³ano do workera');
	}

	myWorker.onmessage = function(e) 
	{//Odebranie danych z w¹tku i ich przetworzenie; info w konsoli
		wynik.textContent = e.data;
		console.log('Odebrano od workera');
	};
}
