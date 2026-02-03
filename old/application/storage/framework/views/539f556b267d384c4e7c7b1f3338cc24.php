<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" id="meta-csrf" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php echo e(config('system.settings_company_name')); ?></title>


    <!--
        web preview example
        http://example.com/invoices/29/pdf?view=preview
        <?php echo e(BASE_DIR.'/'); ?>

    -->

    <?php if(request('view') == 'preview'): ?>
    <base href="<?php echo e(url('/')); ?>" target="_self">
    <link href="public/vendor/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <?php else: ?>
    <base href="" target="_self">
    <link href="<?php echo e(BASE_DIR); ?>/public/vendor/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <?php endif; ?>

    <!-- dompdf font - regular latin characters-->
    <?php if(config('system.settings2_dompdf_fonts') == 'default' || config('system.settings2_dompdf_fonts') == ''): ?>
    <style>
        @font-face {
            font-family: 'DynamicFont';
            font-style: normal;
            font-weight: normal;
            src: url('<?php echo e(storage_path("app/fonts/notosans/NotoSans-Regular.ttf")); ?>') format("truetype");
        }

        @font-face {
            font-family: 'DynamicFont';
            font-style: normal;
            font-weight: 400;
            src: url('<?php echo e(storage_path("app/fonts/notosans/NotoSans-Regular.ttf")); ?>') format("truetype");
        }

        @font-face {
            font-family: 'DynamicFont';
            font-style: normal;
            font-weight: bold;
            src: url('<?php echo e(storage_path("app/fonts/notosans/NotoSans-Bold.ttf")); ?>') format("truetype");
        }

        @font-face {
            font-family: 'DynamicFont';
            font-style: normal;
            font-weight: 600;
            src: url('<?php echo e(storage_path("app/fonts/notosans/NotoSans-Bold.ttf")); ?>') format("truetype");
        }
    </style>
    <?php endif; ?>


    <!-- dompdf font - regular latin characters-->
    <?php if(config('system.settings2_dompdf_fonts') == 'dejavu'): ?>
    <style>
        @font-face {
            font-family: 'DynamicFont';
            font-style: normal;
            font-weight: normal;
            src: url('<?php echo e(storage_path("app/fonts/default/DejaVuSans.ttf")); ?>') format("truetype");
        }

        @font-face {
            font-family: 'DynamicFont';
            font-style: normal;
            font-weight: 400;
            src: url('<?php echo e(storage_path("app/fonts/default/DejaVuSans.ttf")); ?>') format("truetype");
        }

        @font-face {
            font-family: 'DynamicFont';
            font-style: normal;
            font-weight: bold;
            src: url('<?php echo e(storage_path("app/fonts/default/DejaVuSans-Bold.ttf")); ?>') format("truetype");
        }

        @font-face {
            font-family: 'DynamicFont';
            font-style: normal;
            font-weight: 600;
            src: url('<?php echo e(storage_path("app/fonts/default/DejaVuSans-Bold.ttf")); ?>') format("truetype");
        }
    </style>
    <?php endif; ?>

    <!-- dompdf font - japanese characters-->
    <?php if(config('system.settings2_dompdf_fonts') == 'japanese'): ?>
    <style>
        @font-face {
            font-family: 'DynamicFont';
            font-style: normal;
            font-weight: normal;
            src: url('<?php echo e(storage_path("app/fonts/japanese/Meiryo.ttf")); ?>') format("truetype");
        }

        @font-face {
            font-family: 'DynamicFont';
            font-style: normal;
            font-weight: 400;
            src: url('<?php echo e(storage_path("app/fonts/japanese/Meiryo.ttf")); ?>') format("truetype");
        }

        @font-face {
            font-family: 'DynamicFont';
            font-style: normal;
            font-weight: bold;
            src: url('<?php echo e(storage_path("app/fonts/japanese/Meiryo-Bold.ttf")); ?>') format("truetype");
        }

        @font-face {
            font-family: 'DynamicFont';
            font-style: normal;
            font-weight: 600;
            src: url('<?php echo e(storage_path("app/fonts/japanese/Meiryo-Bold.ttf")); ?>') format("truetype");
        }
    </style>
    <?php endif; ?>

    <!-- dompdf font - chinese characters-->
    <?php if(config('system.settings2_dompdf_fonts') == 'chinese-traditional'): ?>
    <style>
        @font-face {
            font-family: 'DynamicFont';
            font-style: normal;
            font-weight: normal;
            src: url('<?php echo e(storage_path("app/fonts/chinese/NotoSansTC-Regular.ttf")); ?>') format("truetype");
        }

        @font-face {
            font-family: 'DynamicFont';
            font-style: normal;
            font-weight: 400;
            src: url('<?php echo e(storage_path("app/fonts/chinese/NotoSansTC-SemiBold.ttf")); ?>') format("truetype");
        }

        @font-face {
            font-family: 'DynamicFont';
            font-style: normal;
            font-weight: bold;
            src: url('<?php echo e(storage_path("app/fonts/chinese/NotoSansTC-Bold.ttf")); ?>') format("truetype");
        }

        @font-face {
            font-family: 'DynamicFont';
            font-style: normal;
            font-weight: 600;
            src: url('<?php echo e(storage_path("app/fonts/chinese/NotoSansTC-ExtraBold.ttf")); ?>') format("truetype");
        }
    </style>
    <?php endif; ?>

    <!-- dompdf font - chinese characters-->
    <?php if(config('system.settings2_dompdf_fonts') == 'chinese-simplified'): ?>
    <style>
        @font-face {
            font-family: 'DynamicFont';
            font-style: normal;
            font-weight: normal;
            src: url('<?php echo e(storage_path("app/fonts/chinese/NotoSansSC-Regular.ttf")); ?>') format("truetype");
        }

        @font-face {
            font-family: 'DynamicFont';
            font-style: normal;
            font-weight: 400;
            src: url('<?php echo e(storage_path("app/fonts/chinese/NotoSansSC-Regular.ttf")); ?>') format("truetype");
        }

        @font-face {
            font-family: 'DynamicFont';
            font-style: normal;
            font-weight: bold;
            src: url('<?php echo e(storage_path("app/fonts/chinese/NotoSansSC-Bold.ttf")); ?>') format("truetype");
        }

        @font-face {
            font-family: 'DynamicFont';
            font-style: normal;
            font-weight: 600;
            src: url('<?php echo e(storage_path("app/fonts/chinese/NotoSansSC-ExtraBold.ttf")); ?>') format("truetype");
        }
    </style>
    <?php endif; ?>

    <!-- dompdf font - korean characters-->
    <?php if(config('system.settings2_dompdf_fonts') == 'korean'): ?>
    <style>
        @font-face {
            font-family: 'DynamicFont';
            font-style: normal;
            font-weight: normal;
            src: url('<?php echo e(storage_path("app/fonts/korean/NotoSansKR-Regular.ttf")); ?>') format("truetype");
        }

        @font-face {
            font-family: 'DynamicFont';
            font-style: normal;
            font-weight: 400;
            src: url('<?php echo e(storage_path("app/fonts/korean/NotoSansKR-Regular.ttf")); ?>') format("truetype");
        }


        @font-face {
            font-family: 'DynamicFont';
            font-style: normal;
            font-weight: bold;
            src: url('<?php echo e(storage_path("app/fonts/korean/NotoSansKR-Bold.ttf")); ?>') format("truetype");
        }

        @font-face {
            font-family: 'DynamicFont';
            font-style: normal;
            font-weight: 600;
            src: url('<?php echo e(storage_path("app/fonts/korean/NotoSansKR-ExtraBold.ttf")); ?>') format("truetype");
        }
    </style>
    <?php endif; ?>

    <?php if(request('view') == 'preview'): ?>
    <link href="<?php echo e(config('theme.selected_theme_pdf_css')); ?>" rel="stylesheet">
    <?php else: ?>
    <link href="<?php echo e(BASE_DIR); ?>/<?php echo e(config('theme.selected_theme_pdf_css')); ?>" rel="stylesheet">
    <?php endif; ?>

    <!--custom CSS file (DB) -->
    <?php echo customDPFCSS(config('system.settings2_bills_pdf_css')); ?>


    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="public/images/favicon.png">
</head>

<body class="pdf-page" style="padding: 0px !important;">

    <div class="" style="padding: 40px 20px; box-shadow: 3px 5px 18px 5px #c5c5c5; border-radius: 10px; margin-bottom: 20px; display: flex; flex-direction: column; justify-content: space-between; background-image: url('https://paramountbuilt.co.uk/wp-content/uploads/2025/top_banner_email_template.png'); background-repeat: no-repeat; background-position: center; background-size: cover;">
        <div class="" style="width: 150px; height: 80px; margin-bottom: 600px;">
            <img width="100%" height="100%" src="https://paramountbuilt.co.uk/wp-content/uploads/2025/paramountbuilt_white_logo.png" alt="Paramountbuilt">	
        </div>
        <div>
            <div class="">
                <div class="" style="padding: 20px; padding-left: 0px;">
                    <h2 style="font-size: 30px; margin: 0px; text-align: center; margin-bottom: 10px;">CLIENT NAME</h2>
                    <h2 style="font-size: 30px; color: #5CC6C4; margin: 0px; text-align: center; margin-bottom: 10px; text-transform: uppercase;"><?php echo e($bill->client_company_name); ?></h2>	
                </div>
            </div>
            <div class="" style="display: flex; flex-direction: row; justify-content: space-between; align-items: center; background-color: #5CC6C4; padding: 5px 30px 15px 30px; border-radius: 60px;">
                <span style="font-size: 11px; color: #fff; margin: 0px; padding-right: 20px;">+44 330 133 9360</span>	
                <span style="font-size: 11px; color: #fff; margin: 0px; padding-right: 20px;">www.paramountbuilt.co.uk</span>
                <span style="font-size: 11px; color: #fff; margin: 0px;">85 Great Portland St, London W1W 7LT, United Kingdom</span>
            </div>
        </div>
    </div>

    <div class="" style="box-shadow: 3px 5px 18px 5px #c5c5c5; border-radius: 10px; margin-bottom: 20px; overflow: hidden;">
        <div style=" padding: 40px 20px; background-image: url('https://paramountbuilt.co.uk/wp-content/uploads/2025/09/template_background.png'); background-size: cover; background-repeat: no-repeat; margin-bottom: 40px; overflow: hidden;">
            <div class="" style="width: 150px; height: 80px; margin-bottom: 20px;">
                <img width="100%" height="100%" src="https://paramountbuilt.co.uk/wp-content/uploads/2025/paramountbuilt_white_logo.png" alt="Paramountbuilt">	
            </div>
            <div class="" style="padding: 20px; padding-left: 0px; margin-bottom: 10px;">
                <h2 style="font-size: 40px; margin: 0px; color: #fff;">
                    <?php if($bill->bill_type == 'invoice'): ?>
                        INVOICE.
                    <?php endif; ?>
                    <?php if($bill->bill_type == 'estimate'): ?>
                        ESTIMATE.
                    <?php endif; ?>
                    <?php if($bill->bill_type == 'invoice'): ?>
                        #<?php echo e($bill->formatted_bill_invoiceid); ?>

                    <?php endif; ?>
                    <?php if($bill->bill_type == 'estimate'): ?>
                        #<?php echo e($bill->formatted_bill_estimateid); ?>

                    <?php endif; ?>
                </h2>
                <h2 style="font-size: 25px; margin: 0px; color: #fff;">
                    <?php if($bill->bill_type == 'invoice'): ?>
                        INVOICE DATE
                    <?php endif; ?>
                    :
                    <?php if($bill->bill_type == 'estimate'): ?>
                        ESTIMATE DATE
                    <?php endif; ?>
                    <?php echo e(runtimeDate($bill->bill_date)); ?>

                </h2>
            </div>

            <div style="background-color: #fff; padding: 10px; border-radius: 20px; margin-bottom: 50px;">
                <h3 style="margin: 0px; margin-bottom: 10px;">
                    <?php if($bill->bill_type == 'invoice'): ?>
                        INVOICE FROM.
                    <?php endif; ?>
                    <?php if($bill->bill_type == 'estimate'): ?>
                        ESTIMATE FROM.
                    <?php endif; ?>
                </h3>
                <h2 style="font-size: 40px; color: #5CC6C4;"><?php echo e(config('system.settings_company_name')); ?></h2>
                <p class="text-muted m-l-5">
                    <?php if(config('system.settings_company_address_line_1')): ?>
                    <?php echo e(config('system.settings_company_address_line_1')); ?>

                    <?php endif; ?>
                    <?php if(config('system.settings_company_city')): ?>
                    <br /> <?php echo e(config('system.settings_company_city')); ?>

                    <?php endif; ?>
                    <?php if(config('system.settings_company_state')): ?>
                    <br /><?php echo e(config('system.settings_company_state')); ?>

                    <?php endif; ?>
                    <?php if(config('system.settings_company_zipcode')): ?>
                    <br /> <?php echo e(config('system.settings_company_zipcode')); ?>

                    <?php endif; ?>
                    <?php if(config('system.settings_company_country')): ?>
                    <br /> <?php echo e(config('system.settings_company_country')); ?>

                    <?php endif; ?>

                    <!--custom company fields-->
                    <?php if(config('system.settings_company_customfield_1') != ''): ?>
                    <br /> <?php echo e(config('system.settings_company_customfield_1')); ?>

                    <?php endif; ?>
                    <?php if(config('system.settings_company_customfield_2') != ''): ?>
                    <br /> <?php echo e(config('system.settings_company_customfield_2')); ?>

                    <?php endif; ?>
                    <?php if(config('system.settings_company_customfield_3') != ''): ?>
                    <br /> <?php echo e(config('system.settings_company_customfield_3')); ?>

                    <?php endif; ?>
                    <?php if(config('system.settings_company_customfield_4') != ''): ?>
                    <br /> <?php echo e(config('system.settings_company_customfield_4')); ?>

                    <?php endif; ?>
                </p>
                
            </div>
            <div style="background-color: #fff; padding: 10px; border-radius: 20px; margin-bottom: 50px;">
                <h3 class="">
                    <?php if($bill->bill_type == 'invoice'): ?>
                        INVOICE TO.
                    <?php endif; ?>
                    <?php if($bill->bill_type == 'estimate'): ?>
                        ESTIMATE TO.
                    <?php endif; ?>
                </h3>
                <a href="<?php echo e(url('clients/'.$bill->client_id)); ?>">
                    <h4 style="font-size: 40px; color: #5CC6C4; margin: 0px; margin-bottom: 10px;"><?php echo e($bill->client_company_name); ?></h4>
                </a>
                <p class="text-muted m-l-30">
                    <?php if($bill->client_billing_street): ?>
                    <?php echo e($bill->client_billing_street); ?>

                    <?php endif; ?>
                    <?php if($bill->client_billing_city): ?>
                    <br /> <?php echo e($bill->client_billing_city); ?>

                    <?php endif; ?>
                    <?php if($bill->client_billing_state): ?>
                    <br /> <?php echo e($bill->client_billing_state); ?>

                    <?php endif; ?>
                    <?php if($bill->client_billing_zip): ?>
                    <br /> <?php echo e($bill->client_billing_zip); ?>

                    <?php endif; ?>
                    <?php if($bill->client_billing_country): ?>
                    <br /> <?php echo e($bill->client_billing_country); ?>

                    <?php endif; ?>

                    <!--custom fields-->
                    <?php $__currentLoopData = $customfields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($field->customfields_show_invoice == 'yes' && $field->customfields_status == 'enabled'): ?>
                    <?php $key = $field->customfields_name; ?>
                    <?php $customfield = $bill[$key] ?? ''; ?>
                    <?php if($customfield != ''): ?>
                    <br /><?php echo e($field->customfields_title); ?>:
                    <?php echo e(runtimeCustomFieldsFormat($customfield, $field->customfields_datatype)); ?>

                    <?php endif; ?>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </p>
            </div>
            <div style="padding-bottom: 30px;">
                <div style="background-color: #fff; padding: 10px; border-radius: 20px; margin-top: 30px;">
                    <h3 style="margin: 0px; margin-bottom: 10px;">Balance Due</h3>
                    <h2 style="font-size: 40px; color: #5CC6C4 ; margin: 0px;"><?php echo runtimeMoneyFormatPDF($bill->bill_final_amount); ?></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="bill-pdf <?php echo e(config('css.bill_mode')); ?> <?php echo e($page['bill_mode'] ?? ''); ?>">

        <!--HEADER-->
        <div class="bill-header"> 
            <!--INVOICE HEADER-->
            <?php if($bill->bill_type =='invoice'): ?>
            <table>
                <tbody>
                    <tr>
                        <td class="x-left">
                            <div class="x-logo">
                                <!-- <img style="width: 200px; height: 100px;"
                                    src="<?php echo e(BASE_DIR); ?>/storage/logos/app/<?php echo e(config('system.settings_system_logo_large_name')); ?>"> -->
                            </div>
                        </td>
                        <td class="x-right">
                            <div class="x-bill-type">
                                <!--draft-->
                                <span
                                    class="js-invoice-statuses <?php echo e(runtimeInvoiceStatus('draft', $bill->bill_status)); ?>"
                                    id="invoice-status-draft">
                                    <h2
                                        class="text-uppercase <?php echo e(runtimeInvoiceStatusColors($bill->bill_status, 'text')); ?> muted">
                                        <?php echo e(cleanLang(__('lang.draft'))); ?></h2>
                                </span>
                                <!--due-->
                                <span class="js-invoice-statuses <?php echo e(runtimeInvoiceStatus('due', $bill->bill_status)); ?>"
                                    id="invoice-status-due">
                                    <h2
                                        class="text-uppercase <?php echo e(runtimeInvoiceStatusColors($bill->bill_status, 'text')); ?>">
                                        <?php echo e(cleanLang(__('lang.due'))); ?></h2>
                                </span>
                                <!--overdue-->
                                <span
                                    class="js-invoice-statuses <?php echo e(runtimeInvoiceStatus('overdue', $bill->bill_status)); ?>"
                                    id="invoice-status-overdue">
                                    <h2
                                        class="text-uppercase <?php echo e(runtimeInvoiceStatusColors($bill->bill_status, 'text')); ?>">
                                        <?php echo e(cleanLang(__('lang.overdue'))); ?></h2>
                                </span>
                                <!--paid-->
                                <span class="js-invoice-statuses <?php echo e(runtimeInvoiceStatus('paid', $bill->bill_status)); ?>"
                                    id="invoice-status-paid">
                                    <h2
                                        class="text-uppercase <?php echo e(runtimeInvoiceStatusColors($bill->bill_status, 'text')); ?>">
                                        <?php echo e(cleanLang(__('lang.paid'))); ?></h2>
                                </span>
                            </div>
                            <div class="x-bill-type">
                                <h4><strong><?php echo e(cleanLang(__('lang.invoice'))); ?></strong></h4>
                                <h5><?php echo e($bill->formatted_bill_invoiceid); ?></h5>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php endif; ?>
            <!--ESTIMATE HEADER-->
            <?php if($bill->bill_type =='estimate'): ?>
            <table>
                <tbody>
                    <tr>
                        <td class="x-left">
                            <div class="x-logo">
                                <!-- <img
                                    src="<?php echo e(BASE_DIR); ?>/storage/logos/app/<?php echo e(config('system.settings_system_logo_large_name')); ?>"> -->
                            </div>
                        </td>
                        <td class="x-right">
                            <div class="x-bill-type">
                                <!--draft-->
                                <span
                                    class="js-estimate-statuses <?php echo e(runtimeEstimateStatus('draft', $bill->bill_status)); ?>"
                                    id="estimate-status-draft">
                                    <h2
                                        class="text-uppercase <?php echo e(runtimeEstimateStatusColors($bill->bill_status, 'text')); ?> muted">
                                        <?php echo e(cleanLang(__('lang.draft'))); ?></h2>
                                </span>
                                <!--new-->
                                <span
                                    class="js-estimate-statuses <?php echo e(runtimeEstimateStatus('new', $bill->bill_status)); ?>"
                                    id="estimate-status-new">
                                    <h2
                                        class="text-uppercase <?php echo e(runtimeEstimateStatusColors($bill->bill_status, 'text')); ?>">
                                        <?php echo e(cleanLang(__('lang.new'))); ?></h2>
                                </span>
                                <!--accepted-->
                                <span
                                    class="js-estimate-statuses <?php echo e(runtimeEstimateStatus('accepted', $bill->bill_status)); ?>"
                                    id="estimate-status-accpeted">
                                    <h2
                                        class="text-uppercase <?php echo e(runtimeEstimateStatusColors($bill->bill_status, 'text')); ?>">
                                        <?php echo e(cleanLang(__('lang.accepted'))); ?></h2>
                                </span>
                                <!--declined-->
                                <span
                                    class="js-estimate-statuses <?php echo e(runtimeEstimateStatus('declined', $bill->bill_status)); ?>"
                                    id="estimate-status-declined">
                                    <h2
                                        class="text-uppercase <?php echo e(runtimeEstimateStatusColors($bill->bill_status, 'text')); ?>">
                                        <?php echo e(cleanLang(__('lang.declined'))); ?></h2>
                                </span>
                                <!--revised-->
                                <span
                                    class="js-estimate-statuses <?php echo e(runtimeEstimateStatus('revised', $bill->bill_status)); ?>"
                                    id="estimate-status-revised">
                                    <h2
                                        class="text-uppercase <?php echo e(runtimeEstimateStatusColors($bill->bill_status, 'text')); ?>">
                                        <?php echo e(cleanLang(__('lang.revised'))); ?></h2>
                                </span>
                                <!--expired-->
                                <span
                                    class="js-estimate-statuses <?php echo e(runtimeEstimateStatus('expired', $bill->bill_status)); ?>"
                                    id="estimate-status-expired">
                                    <h2
                                        class="text-uppercase <?php echo e(runtimeEstimateStatusColors($bill->bill_status, 'text')); ?>">
                                        <?php echo e(cleanLang(__('lang.expired'))); ?></h2>
                                </span>
                            </div>
                            <div class="x-bill-type">
                                <h4><strong><?php echo e(cleanLang(__('lang.estimate'))); ?></strong></h4>
                                <h5>#<?php echo e($bill->formatted_bill_estimateid); ?></h5>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php endif; ?>
        </div>

        <!--DATES & AMOUNT DUE-->

        <!--INVOICE TABLE-->
        <div class="bill-table-pdf">
            <?php echo $__env->make('pages.bill.components.elements.main-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <!-- TOTAL & SUMMARY -->
        <div class="bill-totals-table-pdf">
            <?php echo $__env->make('pages.bill.components.elements.totals-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        
    </div>

    <div class="" style="box-shadow: 3px 5px 18px 5px #c5c5c5; border-radius: 10px; margin-bottom: 20px; overflow: hidden; padding-top: 50px;">
        <div style="padding: 40px 20px; background-image: url('https://paramountbuilt.co.uk/wp-content/uploads/2025/09/template_background.png'); background-size: cover; background-repeat: no-repeat; overflow: hidden; border-radius: 10px;">
            <div class="" >
                <img width="200px" height="150px" src="https://paramountbuilt.co.uk/wp-content/uploads/2025/paramountbuilt_white_logo.png" alt="Paramountbuilt">	
            </div>
            <div class="">
                <div class="" style="padding: 20px; padding-left: 0px; text-align: center;">
                    <h2 style="font-size: 30px; margin: 0px; color: #000; margin-bottom: 5px;">Terms and Conditions of</h2>
                    <h2 style="font-size: 30px; margin: 0px; color: #000; margin-bottom: 10px;">Service</h2>
                    <h2 style="font-size: 30px; margin: 0px; color: #fff; margin-bottom: 10px; line-height: 30px;">(Company Registered in England, No: 15067256)</h2>
                </div>
            </div>
        </div>
        <div style="">
            <h2 style="margin: 0px;">Definitions</h2>
            <p><spam style="color: #5CC6C4; font-weight: bold;">Company:</spam> Paramountbuilt Ltd. (Company No: 15067256).</p>
            <p><spam style="color: #5CC6C4; font-weight: bold;">Client:</spam> Individual or entity commissioning services.</p>
            <p><spam style="color: #5CC6C4; font-weight: bold;">Proposal:</spam> Written document outlining agreed services, fees, and project scope.</p>
            <p><spam style="color: #5CC6C4; font-weight: bold;">Services:</spam> Architectural design, planning permission, structural calculations, building regulations compliance, party wall, boundary services, inspections, consultations, and related services outlined in the Proposal.</p>

            <h2 style="margin: 0px;">Acceptance of Terms</h2>
            <p>By signing or accepting the Proposal electronically or physically, the Client acknowledges acceptance and agreement to these Terms and Conditions.</p>

            <h2 style="margin: 0px;">Scope of Services</h2>
            <p>The Company shall provide services detailed explicitly within the signed Proposal. Any services outside this agreed scope shall require a separate written agreement.</p>

            <h2 style="margin: 0px;">Fees and Payment Terms</h2>
            <div>
                <div>
                    <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                        <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                        Payment terms are clearly defined in the Proposal.
                    </p>
                </div>
                <div>
                    <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                        <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                        Payment is due upon invoicing or as per agreed milestones.
                    </p>
                </div>
                <div>
                    <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                        <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                        Late payments may incur statutory interest under the Late Payment of Commercial Debts (Interest) Act 1998.
                    </p>
                </div>
            </div>

            <h2 style="margin: 0px;">Client Obligations</h2>
            <p style="font-size: 12px;">The Client shall:</p>
            <div>
                <div>
                    <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                        <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                        Provide accurate, complete information and timely cooperation.
                    </p>
                </div>
                <div>
                    <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                        <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                        Grant necessary access to premises and relevant documentation.
                    </p>
                </div>
                <div>
                    <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                        <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                        Ensure timely decisions and approvals to avoid project delays.
                    </p>
                </div>
            </div>
            <h2 style="margin: 0px;">Amendments and Additional Work</h2>
            <p style="font-size: 12px;">Any additional work or modifications requested beyond the original Proposal must be agreed upon in writing and may incur additional charges and timelines.</p>

            <h2 style="margin: 0px;">Intellectual Property Rights</h2>
            <div>
                <div>
                    <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                        <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                        All intellectual property rights related to the provided designs, drawings, calculations, and documents shall remain the exclusive property of Paramountbuilt Ltd. until full payment is received.
                    </p>
                </div>
                <div>
                    <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                        <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                        Unauthorised usage, duplication, or distribution is prohibited.
                    </p>
                </div>
            </div>

            <h2 style="margin: 0px;">Planning Permissions and Building Regulations</h2>
            <div>
                <div>
                    <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                        <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                        The Company will prepare and submit required documentation professionally but cannot guarantee approvals from planning councils or building control authorities.
                    </p>
                </div>
                <div>
                    <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                        <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                        All approval decisions rest exclusively with relevant authorities.
                    </p>
                </div>
            </div>

            <h2 style="margin: 0px;">Structural and Inspection Services</h2>
            <div>
                <div>
                    <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                        <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                        Structural calculations comply with current British Standards and regulations.
                    </p>
                </div>
                <div>
                    <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                        <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                        Inspection services provided are visual and non-invasive unless explicitly agreed otherwise.
                    </p>
                </div>
            </div>

            <h2 style="margin: 0px;">Party Wall and Boundary Services</h2>
            <div>
                <div>
                    <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                        <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                        Party wall services are provided in line with the Party Wall etc. Act 1996.
                    </p>
                </div>
                <div>
                    <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                        <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                        Boundary consultations do not constitute legal advice; legal representation must be sought separately if required.
                    </p>
                </div>
            </div>
            <h2 style="margin: 0px;">Consultations</h2>
            <div>
                <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                    <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                    Consultations (Zoom, phone, or otherwise) are by appointment. Extended sessions beyond agreed durations may incur additional charges.
                </p>
            </div>
            <h2 style="margin: 0px;">Liability Limitation</h2>
            <div>
                <div>
                    <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                        <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                        Paramountbuilt Ltd.’s total liability shall not exceed the total fees payable for the relevant Services.
                    </p>
                </div>
                <div>
                    <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                        <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                        The Company shall not be liable for consequential or indirect losses or damages.
                    </p>
                </div>
            </div>
            <h2 style="margin: 0px;">Indemnity</h2>
            <div>
                <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                    <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                    The Client agrees to indemnify Paramountbuilt Ltd. against all liabilities, costs, claims, or demands arising from the Client’s misuse or unauthorised dissemination of provided documentation or advice.
                </p>
            </div>
            <h2 style="margin: 0px;">Confidentiality</h2>
            <div>
                <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                    <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                    Both parties agree to maintain confidentiality of all sensitive and proprietary information relating to the Services unless disclosure is required by law.
                </p>
            </div>
            <h2 style="margin: 0px;">Insurance</h2>
            <div>
                <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                    <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                    The Company holds appropriate Professional Indemnity Insurance coverage compliant with UK regulations, details available upon request.
                </p>
            </div>
            <h2 style="margin: 0px;">Right to Engage Third Parties</h2>
            <div>
                <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                    <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                    Paramountbuilt Ltd. reserves the right to subcontract or collaborate with third-party consultants or specialists as required, maintaining ultimate responsibility for project delivery quality.
                </p>
            </div>
            <h2 style="margin: 0px;">Marketing and Portfolio Use</h2>
            <div>
                <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                    <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                    The Company reserves the right to use completed project materials, images, or descriptions for marketing purposes unless otherwise explicitly agreed in writing.
                </p>
            </div>
            <h2 style="margin: 0px;">Force Majeure</h2>
            <div>
                <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                    <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                    Neither party will be liable for delays or failures resulting from circumstances beyond reasonable control, including but not limited to acts of God, strikes, pandemics, governmental regulations, or natural disasters.
                </p>
            </div>
            <h2 style="margin: 0px;">Termination</h2>
            <div>
                <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                    <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                    Either party may terminate the agreement upon fourteen (14) days’ written notice. The Client remains liable for all fees incurred up to the termination date.
                </p>
            </div>
            <h2 style="margin: 0px;">Dispute Resolution</h2>
            <div>
                <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                    <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                    Any disputes arising shall first be subject to negotiation between the parties. Should this fail, disputes shall proceed to mediation or arbitration according to English law standards.
                </p>
            </div>
            <h2 style="margin: 0px;">Governing Law and Jurisdiction</h2>
            <div>
                <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                    <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                    These Terms and Conditions shall be governed by and construed in accordance with English law. Both parties agree to submit exclusively to the jurisdiction of the courts of England and Wales.
                </p>
            </div>
            <h2 style="margin: 0px;">Amendments to Terms</h2>
            <div>
                <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                    <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                    The Company reserves the right to amend these Terms and Conditions at its discretion, provided reasonable written notice is given to the Client.
                </p>
            </div>
            <h2 style="margin: 0px;">Entire Agreement</h2>
            <div>
                <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                    <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                    These Terms and Conditions, together with the Proposal, constitute the entire understanding and agreement between Paramountbuilt Ltd. and the Client, superseding any previous understandings, negotiations, or agreements.
                </p>
            </div>
            <div class="">
                <div class="" style="display: flex; flex-direction: row; justify-content: space-between; align-items: center; background-color: #5CC6C4; padding: 5px 30px 15px 30px; border-radius: 60px; margin-top: 50px;">
                    <span style="font-size: 11px; color: #fff; margin: 0px; padding-right: 20px;">+44 330 133 9360</span>	
                    <span style="font-size: 11px; color: #fff; margin: 0px; padding-right: 20px;">www.paramountbuilt.co.uk</span>
                    <span style="font-size: 11px; color: #fff; margin: 0px;">85 Great Portland St, London W1W 7LT, United Kingdom</span>
                </div>

            </div>
        </div>	
    </div>


</body>

</html><?php /**PATH /home/u248167739/domains/accounts.paramountbuilt.co.uk/public_html/application/resources/views/pages/bill/bill-pdf.blade.php ENDPATH**/ ?>