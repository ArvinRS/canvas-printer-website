
<br><br>
<br><br>
<br><br>

<div align="center">
  <h1>tncanvasprints.com
    <br><br>
    <br><br>
  </h1>
</div>

<div align="center">
  <a href="#about">About</a> •
  <a href="#pages">Iterations</a> •
  <a href="#serverinfo">Server Information</a> •
  <a href="#datahandling">Data Handling</a> •

</div>



<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>



# About
The goal of this project is to develop a network of sensors that collects and aggregates data into something that provides useful insights to the SAE Baja team. 

This inital goal was accomplished through the use Sensors, Arduinos, and a Raspberry Pi. 

The Ardiunos used the sensors to collect raw data during the duration of each test run. The Arduino would then transfer this raw data to the Raspberry Pi. The Raspberry Pi aggregates the data from both of the Ardiunos and calculates the desired data points. Once the test run is over, the Raspberry Pi will export the data in human-readable formats. 

### Client: 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Arvin Sanchez

### Back-end and Integration: 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Arvin Sanchez

### Front-end Design: 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Eli Parker

<br><br>
<br><br>

<br><br>


# Pages

## Home Page
Introduction page for the website, with an overhead banner for the navigation menu.

## Gallery Page
Gallery page provides existing prints available for purchase.  Gallery page consists of individual prints with image preview and price.

## About Us Page
About Us Page consists of mission statement as well as printer information.

## Contact Page
Contact Page contains contact information via phone number and e-mail address.

## File Upload Page
File Upload Page will contain a user submission form to upload a single image for printing.  This page will contain user form regarding image, canvas dimension, estimated price, and checkout redirect.  File upload will be handled for mySQL database (TODO) and Python module.

<br><br>

## Issues
One of the issues faced during Iteration 6 was the Raspberry Pi put a default user/password that wasn't clearing out.

This was solved by fixing the error in the code and clearing out the user/password.

<br><br>
<br><br>

# Server Information

Will be run on Apache2 for static web page load
Configure Firewill and access settings with conf file

## Creating Default Document

Website contained within /var/www/

<br><br>

# Data Handling
Forms will be submitted and queried into mySQL Database in conjunction with Python.  Transaction and contact forms TBD
<br><br>














