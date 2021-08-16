<?php 
$extends = 'App/Views/Layouts/default/layout.php';
$this->params['title'] = $title;
$this->params['active'] = $active;
?>

<!-- 
1. Customer name
2. Customer type - choice of the following types: private, business, student
3. Phone
4. Email
5. Full address
6. Gender - Choice of the following genders: man, woman, other.
7. Favorite products - multiple choice of the following options: iPad, iPhone, AppleTV, Apple Watch, Airpods, iMac, Macbook
8. Random image per user (using catAPI ) 
-->

<form action="" id="add-user">

    <div class="mb-3">
        <label class="form-label">Customer name</label>
        <input type="text" class="form-control" placeholder="John Doe">
    </div>

    <div class="mb-3">
        <label class="form-label">Customer type</label>
        <select class="form-select">
            <option selected>Choose...</option>
            <option value="Private">Private</option>
            <option value="Business">Business</option>
            <option value="Student">Student</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="text" class="form-control" placeholder="+9720000000">
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="text" class="form-control" placeholder="example@gmail.com">
    </div>

    <div class="mb-3">  
        <label class="form-label">Full address</label>
        <textarea class="form-control" rows="3"></textarea>        
    </div>

    <div class="mb-3">
        <label class="form-label">Gender</label>
        <select class="form-select">
            <option selected>Choose...</option>
            <option value="Man">Man</option>
            <option value="Woman">Woman</option>
            <option value="Other">Other</option>
        </select>        
    </div>

    <div class="mb-3">
        <label class="form-label">Favorite products</label>
        <select class="form-select">
            <option selected>Choose...</option>
            <option value="iPad">iPad</option>
            <option value="iPhone">iPhone</option>
            <option value="AppleTV">AppleTV</option>
            <option value="Apple Watch">Apple Watch</option>
            <option value="Airpods">Airpods</option>
            <option value="iMac">iMac</option>
            <option value="Macbook">Macbook</option>
        </select> 
    </div>

    <div class="mb-3">
        <label class="form-label">Image</label>
        <input type="text" class="form-control" placeholder="John Doe">
    </div>

    <div>
        <button type="button" class="btn btn-primary">Add new User</button>
    </div>
    
</form>

