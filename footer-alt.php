			<footer class="footer" role="contentinfo">

				<div id="inner-footer" class="wrap clearfix">
                	<div id='white-foot' class='cf'>
						<div class='footer-left'></div>
                        <div class='footer-right'></div>
                        <?php if ( is_active_sidebar( 'sidebar3' ) ) : ?>

							<?php dynamic_sidebar( 'sidebar3' ); ?>
    
                        <?php else : ?>
    
                            <?php // This content shows up if there are no widgets defined in the backend. ?>
    
                            <div class="alert alert-help">
                                <p><?php _e( 'Please activate some Widgets.', 'bonestheme' );  ?></p>
                            </div>
    
                        <?php endif; ?>
    
                        <p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p>
					</div>
				</div>

			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html>
