# <p align = "center">Project Documentation - Vision Document</p>
This project is being done for "Designing Internet Systems" and "Computer Engineering Systems" courses at Voronezh State University. All the details of this project will be given below. The documentation is currently in its infancy and will be updated as new things are added.
# <p align = "center">Quixoteque - Online Clothing Store</p>
<br/>
<p align = "center">Date: 09/11/2021</p>
<p align = "center">Version: 0.0.3</p>
<hr/>
<br/>
<p align = "center">Date: 07/11/2021</p>
<p align = "center">Version: 0.0.2</p>
<hr/>
<p align = "center">Date: 02/11/2021</p>
<p align = "center">Version: 0.0.1</p>
<p align = "center">Author: Yusuf Celil Alak</p>
<hr/>

## 1: Introduction
### 1.1 Purpose:
The aims of the project are:
- Creating an online store of a clothing store called Quixoteque (this store is assumed to be real).
- To enable customers to shop by by choosing the products they want with or without having an account on website.
- Ensuring that the store owner can effectively perform features such as adding a new product, updating the existing product etc.
### 1.2 Scope:
Today, many stores have online shopping websites. In this way, customers can easily buy the products they want by choosing them online, without going to the store. In this project, it is planned to create a useful and functional website for a clothing store called Quixeteque so that users and store owners can use it easily and effectively, as in other applications. 

From this point of view, it is possible to divide the project into two parts. The front side of the website will be designed in a simple way and HTML, CSS, JavaScript and ReactJS or a different framework will be used when necessary. The backend side of the site is planned to be built on Apache Server and database operations are planned to be done with PostgreSQL. The technologies mentioned here are within the current plan and may change according to the course of the project. 
### 1.3 Definitions, acronyms and abbreviations:
- HTML
- CSS
- JavaScript
- ReactJS
- Apache Server
- PostgreSQL
### 1.4 References:
1 - International Business Machines Corporation (IBM) 2020, Vision document, accessed 2 November 2021, <https://www.ibm.com/docs/en/elm/7.0.0?topic=requirements-vision-document>
### 1.5 Overview:
The project document is divided into some sections to make it easier to understand. Each chapter provides a detailed description of the project. In order to see the version control of the document more clearly, it is aimed to open the project on GitHub and follow it from here. In this way, the update dates can be observed in the first part of the document.
## 2: Positioning
### 2.1 Business opportunity:
Since the online shopping site to be built already has a real store, it is expected that the store will have its own customer group. From this point of view, the majority of customers who currently prefer the store will also prefer to shop on the website. In addition, the store can gain more customers with opportunities such as special discounts for online shopping. As a result, with online shopping, people will reach the product they want more easily and effectively, thus a different income source will arise for the store.
### 2.2 Problem statement:
The project will focus on solutions to the following requirements:
- A user-friendly online shopping site should be created.
- Anyone with or without an account on the website should be able to access it.
- Users should be able sign up the site and edit their personal information.
- Users should be able to add and remove the product they want to their shopping card.
- A separate interface should be created for the store owner that only he can access
- The store owner should be able to add and remove the products to the website.
### 2.3 Product position statement: 
## 3: Stakeholder and user descriptions
### 3.1 Market demographics:
Since the planned online shopping website already has a real store, it is expected that the website will have a certain customer group from the first day. These customers will be people who love the brand and follow the products of this brand. But as the popularity of the website and the brand increases, it can be said that it will attract the attention of many people who want to buy clothes. Because of these, the user group of the website will consist of people from almost all ages (except children) who want to buy clothes.
### 3.2 Stakeholder summary:

Name: John Taylor (Fictional Character)

Role: CEO of the clothing company

Description: He is the most responsible person in the company. Although he does not interfere with the features of the website to be created, he will make the final decision for the approval of the project.
<hr/>

Name: Jack Doe (Fictional Character)

Role: Store Manager

Description: In short, he is responsible for controlling many things that happen in the company. Therefore, he must have a different profile on website in order to perform the necessary operations to manage the store.

Responsibilities: 
- Have a private profile on the website that only he/she can access
- Adding the product to the online store when a new product is produced in the store
- Removing the product from the online store when a product is no longer produced in the store
- Updating stocks when items are added or removed in stores

### 3.3 User summary:

Title: Costumers

Role: Shopping on the website

Description: It is the community of people who want to shop from the store. They have the right to use the website by creating an account or not, and can add the product they wants to their card and buy it. They also have the right to cancel an ordered product.

## 4: Product overview
### 4.1 Product perspective:
At the end of the project, an online shopping store that will operate functionally will be ready for use. Even if the website is not interacting with other systems or websites, it is expected to perform some tasks under its own structure. For example, there will be two different profiles in the system as customer and store manager, and these two different profiles will perform different tasks within themselves. While these tasks are taking place, the two profiles will not be affected by each other. In addition, it will be ensured that the website is simple and understandable so that users can use the website comfortably and effectively, and in addition to this, user security will be kept at the forefront.
### 4.2 Summary of capabilities:
Today, both with the continuous development of computers and mobile devices, and due to a pandemic such as Covid-19, people have started to do most of their work in the virtual environment. From this point of view, the number of people ordering through the website or mobile application is increasing day by day. So, this website will be an alternative way for the people who already shop from the store or potential new customers. In this way, people will be able to like a clothes and order it instantly and safely without going to the store, and this will save a great deal of time and space for them.
## 5: Product features
### 5.1 Ability to create account:
Although people will be able to make purchases without opening an account, they will be able to open an account on the website and keep their personal information on the account. In addition, customers who open an account on the website can receive bonus points for each purchase, and with these points, they can earn discounts on their next purchases. The following information can be edited on the account:
- Name
- E-mail
- Password
- Phone Number
- Address
- Card Information
### 5.2 Shopping Operations: 
All users accessing the website have the right to buy products from the store. To make a purchase, users must first add the products they want to their shopping card. Then they can see the products they have added by entering the "Shopping Card" menu. In this menu, they can remove some products if they want, if they decide to buy, they enter the purchase screen by clicking the button. After entering their personal and card information on this screen, the purchase process is completed. For those who do not have an account, a link is given to follow up the details of the purchased products. People who have an account can track their products from "Previous Shopping" section on their own profile.
### 5.3 Management Operations: 
In order to keep the products on the website up-to-date, the store manager must have easy access to the products on the website. Therefore, the store manager should be able to access the site with a different interface than normal customers. The design of this interface should be quite understandable in order to handle the operations easily. Therefore, the store manager will have access to all information about all the products available in the system, including the stock number. If he wishes, he can change the product properties, as well as update the number of the product in stock or remove the product. When he wants to add a new product, it is sufficient to enter the product information and photo. The product features will be as follows:
- Product Name
- Product Photo
- Size (S, M, L, XL, XXL etc.)
- Product Description
- Number of Items in Stock
## 6:Constraints
## 7: Other product requirements
### 7.1 Applicable standards: 
### 7.2 System requirements: 
### 7.3 Performance requirements:
### 7.4 Environmental requirements:
