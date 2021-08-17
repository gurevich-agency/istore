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
        <label class="form-label">Customer name<sup style="color: #ff0000">*</sup></label>
        <input name="name" type="text" class="form-control" required placeholder="John Doe">
    </div>

    <div class="mb-3">
        <label class="form-label">Customer type<sup style="color: #ff0000">*</sup></label>
        <select name="usertype" class="form-select" required>            
            <option value="Private">Private</option>
            <option value="Business">Business</option>
            <option value="Student">Student</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Phone<sup style="color: #ff0000">*</sup></label>
        <input name="phone" type="text" class="form-control" required placeholder="+9720000000">
    </div>

    <div class="mb-3">
        <label class="form-label">Email<sup style="color: #ff0000">*</sup></label>
        <input name="email" type="text" class="form-control" required placeholder="example@gmail.com">
    </div>

    <div class="mb-3">  
        <label class="form-label">Full address<sup style="color: #ff0000">*</sup></label>
        <textarea name="address" class="form-control" rows="3" required></textarea>        
    </div>

    <div class="mb-3">
        <label name="gender" class="form-label">Gender<sup style="color: #ff0000">*</sup></label>
        <select name="gender" class="form-select" required>           
            <option value="Man">Man</option>
            <option value="Woman">Woman</option>
            <option value="Other">Other</option>
        </select>        
    </div>

    <div class="mb-3">
        <label class="form-label">Favorite products<sup style="color: #ff0000">*</sup></label>
        <select name="favorite" class="form-select" required>            
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
        <img src="https://via.placeholder.com/100" id="cat-picture" alt="" style="width: 100px; height: auto">
        <label class="form-label">Image<sup style="color: #ff0000">*</sup></label>        
        <input name="image" type="hidden" class="form-control" placeholder="John Doe" required>
    </div>

    <div>
        <button type="button" class="btn btn-primary js-add-user-button">Add new User</button>
    </div>
    
</form>

