{{-- Mobile responsive styles for Practice Materials list --}}
<style>
    /* Mobile responsive adjustments */
    @media (max-width: 768px) {
        /* Enhanced scrollable table container */
        .table-responsive {
            overflow-x: auto !important;
            -webkit-overflow-scrolling: touch !important;
            border: 1px solid #e5e7eb !important;
            border-radius: 12px !important;
            background: white !important;
            position: relative !important;
        }

        /* Add scroll indicator */
        .table-responsive::after {
            content: "← Swipe to see more →" !important;
            position: absolute !important;
            bottom: 10px !important;
            right: 10px !important;
            background: rgba(59, 130, 246, 0.9) !important;
            color: white !important;
            padding: 4px 8px !important;
            border-radius: 12px !important;
            font-size: 10px !important;
            font-weight: 500 !important;
            pointer-events: none !important;
            z-index: 10 !important;
        }

        /* Adjust table for mobile with proper width */
        .table {
            min-width: 900px !important;
            font-size: 13px !important;
            margin-bottom: 0 !important;
            background: white !important;
        }

        .table th,
        .table td {
            padding: 10px 12px !important;
            vertical-align: middle !important;
            white-space: nowrap !important;
        }

        /* Ensure actions column is visible */
        .table th:last-child,
        .table td:last-child {
            position: sticky !important;
            right: 0 !important;
            background: white !important;
            box-shadow: -2px 0 4px rgba(0,0,0,0.1) !important;
            z-index: 5 !important;
        }

        /* Smaller images on mobile */
        .table img {
            width: 35px !important;
            height: 35px !important;
            border-radius: 6px !important;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1) !important;
        }

        /* Enhanced button visibility and styling */
        .btn {
            padding: 8px 12px !important;
            font-size: 11px !important;
            margin: 1px !important;
            border-radius: 6px !important;
            white-space: nowrap !important;
            min-width: 60px !important;
        }

        .btn-primary {
            background: #3b82f6 !important;
            border-color: #3b82f6 !important;
        }

        .btn-warning {
            background: #f59e0b !important;
            border-color: #f59e0b !important;
        }

        .btn-danger {
            background: #ef4444 !important;
            border-color: #ef4444 !important;
        }

        /* Fix badge styling */
        .table td span {
            font-size: 10px !important;
            padding: 4px 8px !important;
            border-radius: 12px !important;
            white-space: nowrap !important;
            display: inline-block !important;
            font-weight: 600 !important;
        }

        /* Ensure table headers are sticky for better navigation */
        .table thead th {
            position: sticky !important;
            top: 0 !important;
            background: #1f2937 !important;
            color: white !important;
            z-index: 10 !important;
            font-size: 11px !important;
            font-weight: 600 !important;
            text-transform: uppercase !important;
        }

        /* Add mobile-specific column widths */
        .table th:nth-child(1), .table td:nth-child(1) { min-width: 60px !important; } /* Preview */
        .table th:nth-child(2), .table td:nth-child(2) { min-width: 120px !important; } /* Title */
        .table th:nth-child(3), .table td:nth-child(3) { min-width: 150px !important; } /* Description */
        .table th:nth-child(4), .table td:nth-child(4) { min-width: 80px !important; } /* Price */
        .table th:nth-child(5), .table td:nth-child(5) { min-width: 80px !important; } /* Link */
        .table th:nth-child(6), .table td:nth-child(6) { min-width: 90px !important; } /* Created */
        .table th:nth-child(7), .table td:nth-child(7) { min-width: 140px !important; } /* Actions */

        /* Header adjustments */
        .content-header {
            padding: 20px 15px !important;
            margin-bottom: 20px !important;
        }

        .content-header h1 {
            font-size: 24px !important;
            text-align: center !important;
            justify-content: center !important;
        }

        /* Make create button full width */
        .modern-create-btn {
            width: 100% !important;
            margin-bottom: 20px !important;
            justify-content: center !important;
            font-size: 14px !important;
            padding: 15px 20px !important;
        }

        /* Search and pagination */
        .dataTables_filter input {
            width: 100% !important;
            margin-bottom: 15px !important;
        }

        .dataTables_length {
            margin-bottom: 15px !important;
        }

        .pagination {
            justify-content: center !important;
            flex-wrap: wrap !important;
        }

        /* Content adjustments */
        .box-body, .card-body {
            padding: 15px !important;
        }
    }

    /* Extra small screens */
    @media (max-width: 480px) {
        .table {
            min-width: 650px !important;
            font-size: 13px !important;
        }

        .table th,
        .table td {
            padding: 10px 6px !important;
        }

        .table img {
            width: 35px !important;
            height: 35px !important;
        }

        .btn {
            padding: 5px 8px !important;
            font-size: 11px !important;
        }

        .content-header h1 {
            font-size: 20px !important;
        }

        .modern-create-btn {
            font-size: 13px !important;
            padding: 12px 16px !important;
        }
    }
</style>

{{-- Add mobile scroll helper --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Only run on mobile
    if (window.innerWidth <= 768) {
        const tableContainer = document.querySelector('.table-responsive');
        if (tableContainer) {
            // Add scroll position indicator
            function updateScrollIndicator() {
                const scrollLeft = tableContainer.scrollLeft;
                const maxScroll = tableContainer.scrollWidth - tableContainer.clientWidth;
                const scrollPercentage = (scrollLeft / maxScroll) * 100;

                // Remove existing indicator
                const existingIndicator = document.querySelector('.scroll-indicator');
                if (existingIndicator) {
                    existingIndicator.remove();
                }

                // Add new indicator if there's content to scroll
                if (maxScroll > 0) {
                    const indicator = document.createElement('div');
                    indicator.className = 'scroll-indicator';
                    indicator.style.cssText = `
                        position: absolute;
                        top: 10px;
                        right: 10px;
                        background: rgba(59, 130, 246, 0.9);
                        color: white;
                        padding: 6px 12px;
                        border-radius: 16px;
                        font-size: 11px;
                        font-weight: 600;
                        z-index: 100;
                        pointer-events: none;
                    `;

                    if (scrollPercentage < 5) {
                        indicator.textContent = '← Swipe to see actions';
                    } else if (scrollPercentage > 95) {
                        indicator.textContent = 'Swipe right to scroll back →';
                    } else {
                        indicator.textContent = `${Math.round(scrollPercentage)}% scrolled`;
                    }

                    tableContainer.style.position = 'relative';
                    tableContainer.appendChild(indicator);

                    // Auto-hide after 3 seconds
                    setTimeout(() => {
                        if (indicator && indicator.parentNode) {
                            indicator.style.opacity = '0';
                            indicator.style.transition = 'opacity 0.5s';
                            setTimeout(() => {
                                if (indicator && indicator.parentNode) {
                                    indicator.remove();
                                }
                            }, 500);
                        }
                    }, 3000);
                }
            }

            // Update indicator on scroll
            tableContainer.addEventListener('scroll', updateScrollIndicator);

            // Initial indicator
            setTimeout(updateScrollIndicator, 500);
        }
    }
});
</script>
