//console.log(' Welcome Node ! By Wap ');

// const http = require("http"); 

// const server  = http.createServer(function(request,response){
// 	response.write("Hello Node");
// 	console.log('Hello Node');
// 	response.end();
// });
// console.log(http);
// console.log("testing");
// console.log(server);

// server.listen(4040);

//Second 

// const http   = require('http');
 
// const server  =  http.createServer((request,response)=>{
// 	response.write('Hello');
// 	response.end();
// });

//  server.listen(8080);



const http  = require('http');

const server = http.createServer((request,response)=>{
   
   //operation 
   	const date = new Date(); 
    const current_date = date.toLocaleDateString(); 

  // header info
 
   response.writeHead(200,{
   	 'Content-Type':'application/json'
   });

   //response in json format [so created json format in below]
 
    const result = {
    	current_date : current_date
    };

    const string_data = JSON.stringify(result);  // JSON.stringify() this function conver json object into string

 // NOTE :- response.write() write mai kabhi bhi json ke format mai data pass nahi hota hai always strign pass hota hai
   response.write(string_data);


  //disconnect user
   response.end(); 

}); 

server.listen(8080);