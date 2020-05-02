$(function() {

    //Wait for Pinegrow to wake-up
    $("body").one("pinegrow-ready", function(e, pinegrow) {

        //Create new Pinegrow framework object
        var f = new PgFramework("UserLib", "UserLib");

        //This will prevent activating multiple versions of this framework being loaded
        f.type = "UserLib";
        f.allow_single_type = true;
        f.user_lib = true

        var comp_comp1 = new PgComponentType('comp1', 'Comp 1 / Badge');
        comp_comp1.code = '<span class="badge badge-c-purple mb-3">About us</span>';
        comp_comp1.parent_selector = null;
        f.addComponentType(comp_comp1);
        
        var comp_comp2 = new PgComponentType('comp2', 'Breadcrumbs Referrals');
        comp_comp2.code = '<div class="breadcrumb col-md-9 mb-3" data-pg-collapsed>\
    <ol class="breadcrumb" cms-breadcrumbs cms-breadcrumbs-item="> li:nth-of-type(2)" cms-breadcrumbs-item-name="> li:nth-of-type(2) > a" cms-breadcrumbs-first-item="> li:nth-of-type(1)" cms-breadcrumbs-first-item-name="> li:nth-of-type(1) > a" cms-breadcrumbs-home cms-no-export> \
        <li class="breadcrumb-item">\
            <a href="#">Home</a>\
        </li>         \
        <li class="breadcrumb-item">\
            <a href="#">Library</a>\
        </li>         \
        <li class="breadcrumb-item active">Data</li>         \
    </ol>\
    <ol wp-call-function="if (function_exists(\'rank_math_the_breadcrumbs\')) rank_math_the_breadcrumbs();" class="breadcrumb"> \
        <li class="breadcrumb-item">\
            <a href="#">Home</a>\
        </li>         \
        <li class="breadcrumb-item">\
            <a href="#">Library</a>\
        </li>         \
        <li class="breadcrumb-item active">Data</li>         \
    </ol>\
</div>';
        comp_comp2.parent_selector = '.row';
        f.addComponentType(comp_comp2);
        
        //Tell Pinegrow about the framework
        pinegrow.addFramework(f);
            
        var section = new PgFrameworkLibSection("UserLib_lib", "Components");
        //Pass components in array
        section.setComponentTypes([comp_comp1, comp_comp2]);

        f.addLibSection(section);
   });
});