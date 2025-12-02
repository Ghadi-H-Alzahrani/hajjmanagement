<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // status (if not present yet)
            if (!Schema::hasColumn('projects', 'status')) {
                $table->enum('status', ['لم تبدأ', 'قيد التنفيذ', 'مكتملة'])
                      ->default('لم تبدأ')
                      ->after('assigned_manager_id');
            }

            // optional technical / custom fields
            if (!Schema::hasColumn('projects', 'ac_capacity')) {
                $table->float('ac_capacity')->nullable()->after('tent_area');
            }
            if (!Schema::hasColumn('projects', 'transformer_numbers')) {
                $table->string('transformer_numbers')->nullable()->after('ac_capacity');
            }

            // pre-execution fields
            if (!Schema::hasColumn('projects', 'pre_allocation_received')) {
                $table->enum('pre_allocation_received', ['تم', 'لم يتم'])->nullable()->after('map_file_name');
            }
            if (!Schema::hasColumn('projects', 'pre_allocation_reason')) {
                $table->text('pre_allocation_reason')->nullable()->after('pre_allocation_received');
            }

            if (!Schema::hasColumn('projects', 'site_received_from_kdana')) {
                $table->enum('site_received_from_kdana', ['تم', 'لم يتم'])->nullable()->after('pre_allocation_reason');
            }
            if (!Schema::hasColumn('projects', 'site_received_reason')) {
                $table->text('site_received_reason')->nullable()->after('site_received_from_kdana');
            }
            if (!Schema::hasColumn('projects', 'reschedule_date')) {
                $table->date('reschedule_date')->nullable()->after('site_received_reason');
            }

            if (!Schema::hasColumn('projects', 'license_received')) {
                $table->enum('license_received', ['تم', 'لم يتم'])->nullable()->after('reschedule_date');
            }
            if (!Schema::hasColumn('projects', 'license_reason')) {
                $table->text('license_reason')->nullable()->after('license_received');
            }

            // store list of pre-execution file paths/names if you want JSON (optional)
            if (!Schema::hasColumn('projects', 'pre_execution_files')) {
                $table->json('pre_execution_files')->nullable()->after('license_reason');
            }
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            if (Schema::hasColumn('projects', 'pre_execution_files')) {
                $table->dropColumn('pre_execution_files');
            }
            if (Schema::hasColumn('projects', 'license_reason')) {
                $table->dropColumn('license_reason');
            }
            if (Schema::hasColumn('projects', 'license_received')) {
                $table->dropColumn('license_received');
            }
            if (Schema::hasColumn('projects', 'reschedule_date')) {
                $table->dropColumn('reschedule_date');
            }
            if (Schema::hasColumn('projects', 'site_received_reason')) {
                $table->dropColumn('site_received_reason');
            }
            if (Schema::hasColumn('projects', 'site_received_from_kdana')) {
                $table->dropColumn('site_received_from_kdana');
            }
            if (Schema::hasColumn('projects', 'pre_allocation_reason')) {
                $table->dropColumn('pre_allocation_reason');
            }
            if (Schema::hasColumn('projects', 'pre_allocation_received')) {
                $table->dropColumn('pre_allocation_received');
            }
            if (Schema::hasColumn('projects', 'transformer_numbers')) {
                $table->dropColumn('transformer_numbers');
            }
            if (Schema::hasColumn('projects', 'ac_capacity')) {
                $table->dropColumn('ac_capacity');
            }

            // drop status only if it exists and you want to rollback it
            if (Schema::hasColumn('projects', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};
