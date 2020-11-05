		

		var arr = [3, 2, 21, 15, 10];	
		// display the array in console
		console.log(arr);
		let app1 = document.querySelector('#app1');
		let t1 = "The original array that we have is: ";
		t1 += arr.toString();
		app1.innerHTML = t1;

		// add a line break
		let br = document.createElement('br');
		app1.appendChild(br);

		// create a comment node
		let txt1 = "Don't forget open the developer tool on your web browser. The array also shows up in the console there.";
		let elm1 = document.createElement('span');
		elm1.className = 'notes';
		elm1.innerHTML = txt1;
		
		// append the comment node to app1
		app1.append(elm1);

		let btn1 = document.querySelector('#btn1');

		function compareInNumeric(v1, v2) {
			return v1 - v2;
		}

		btn1.onclick = function () {
			// alert("func1 is running.");
			arr.sort(compareInNumeric);
			console.log(arr);

			let app2 = document.querySelector('#app2');
			app2.innerHTML = "The rearranged array that we have now is: ";
			app2.innerHTML += arr.toString();
			let br = document.createElement('br');

			app2.appendChild(br);
			// create a comment node
			let txt2 = "The sorting is based on numeric values.";
			let elm2 = document.createElement('span');
			elm2.className = 'notes';
			elm2.innerHTML = txt2;
			
			// append the comment node to app1
			app2.append(elm2);
		}

		let btn2 = document.querySelector('#btn2');
		btn2.onclick = function() {
			document.querySelector('#app2').innerHTML = '';


		}

